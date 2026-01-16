<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AmbassadorService;
use App\AmbassadorReward;
use App\AmbassadorServiceAction;
use App\AmbassadorActivity;
use App\CurriculumType;
use App\CurriculumCourse;
use App\StudentEnrolledCourse;
use App\CatalogCourse;
use App\AmbassadorRedemption;
use App\AmbassadorRedemptionOrder;
use DB;
use App\HelpDesk;

use Carbon\Carbon;

class StudentController extends Controller
{
    public function dashboard(){
        return view('student.dashboard');
    }

    public function resetPassPage() {
        
        return view('student.reset-password');
    }

    public function ambassadorPage() {
        $ambassador_services = AmbassadorService::all();
        $ambassador_rewards = AmbassadorReward::all();
        $activities = AmbassadorActivity::with(['service', 'action'])->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        // Last activity
        $lastActivity = AmbassadorActivity::with(['service', 'action'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first();

        // Total collected points
        $totalPoints = AmbassadorActivity::where('user_id', auth()->id())
        ->where('status', 'Approved')
        ->with('action')
        ->get()
        ->sum(fn ($a) => ($a->action->value ?? 0) + ($a->redeem_points ?? 0));
        
        return view('student.ambassador')
            ->with('ambassador_rewards', $ambassador_rewards)
            ->with('ambassador_services', $ambassador_services)
            ->with('activities', $activities)
            ->with('lastActivity', $lastActivity)
            ->with('totalPoints', $totalPoints);
    }

    public function getActivities($platform_id) {
        $activities = AmbassadorServiceAction::where('service_id', $platform_id)->get();

        return response()->json($activities);
    }

    public function storeActivity(Request $request) {
        $request->validate([
            'service_id' => 'required',
            'action_id'  => 'required',
            'link'       => 'required',
        ]);

        AmbassadorActivity::create([
            'service_id' => $request->service_id,
            'action_id'  => $request->action_id,
            'link'       => $request->link,
            'status'     => 'Pending',
            'user_id'    => auth()->id(),
        ]);

        return back()->with('success_message', 'Activity submitted successfully!');
    }

    public function myCoursesPage() {
        $curriculumTypes = CurriculumType::with([
            'categories' => function ($q) {
                $q->orderBy('name');
            },
            'categories.curriculumCourses.course',
            'curriculumCourses.course'
        ])->orderBy('id')->get();

        $enrolled_courses = StudentEnrolledCourse::where('user_id',auth()->user()->id)->get();
        $enrolled_courses_ids = $enrolled_courses->pluck('catalog_course_id')->toArray();
        return view('student.my-courses')
            ->with('enrolled_courses', $enrolled_courses)
            ->with('enrolled_courses_ids', $enrolled_courses_ids)
            ->with('curriculumTypes', $curriculumTypes);
    }

    public function singleCourse($course_id) {
        $course = CatalogCourse::find($course_id);
        return view('student.single-course')
            ->with('course',$course);
    }

    public function studyMentor(){
        return view('student.study-mentor');
    }

    public function singleStudyMentor(){
        return view('student.single-study-mentor');
    }

    public function singleStudyMentorChat(){
        return view('student.single-study-mentor-chat');
    }

    public function helpDesk(){
       
        $help_desk = HelpDesk::where('user_id',auth()->id())->whereNull('related_to')->get();
        return view('help-desk.inbox')
                ->with('help_desk',$help_desk);
    }

    public function newHelpDesk(){
        return view('help-desk.new');
    }

    public function sendHelpDeskQustion(Request $request){
        $message = $request->only('title','message');
        $message['user_id'] = auth()->user()->id;
        $message['slug'] = $this->setHelpDeskNumber();
        $message['is_new'] = 1;
        $message['is_admin'] = 0;
        $message['is_parent'] = 0;
        HelpDesk::create($message);
        return redirect()->route('student.help-desk')->with('success_message','Message successfully created');
    }
    
    public function redeemRewards(Request $request) {
        $request->validate([
            'rewards' => 'required|array|min:1',
            'rewards.*.id' => 'required|exists:ambassador_rewards,id',

            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
        ]);

        $user = auth()->user();

        // Recalculate total points (SECURITY)
        $totalPoints = AmbassadorActivity::where('user_id', $user->id)
            ->with('action')
            ->get()
            ->sum(fn ($activity) => $activity->action->value ?? 0);

        if ($totalPoints <= 500) {
            return back()->withErrors('You need more than 500 points to redeem rewards.');
        }

        $basketTotal = collect($request->rewards)->sum(function ($reward) {
            return AmbassadorReward::find($reward['id'])->points;
        });

        if ($basketTotal < 500) {
            return back()->withErrors('Minimum redemption is 500 points.');
        }

        if ($basketTotal > $totalPoints) {
            return back()->withErrors('Not enough points.');
        }

        DB::transaction(function () use ($request, $user, $basketTotal) {

            $order = AmbassadorRedemptionOrder::create([
                'user_id' => $user->id,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'total_points' => $basketTotal,
            ]);

            // Save redemptions
            foreach ($request->rewards as $reward) {
                $rewardModel = AmbassadorReward::findOrFail($reward['id']);

                AmbassadorRedemption::create([
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'reward_id' => $rewardModel->id,
                    'points' => $rewardModel->points,
                ]);
            }

            // Deduct points via activity log
            AmbassadorActivity::create([
                'user_id' => $user->id,
                'service_id' => null,
                'action_id' => null,
                'link' => 'Redeem Rewards',
                'redeem_points' => -$basketTotal,
            ]);
        });

        return back()->with('success_message', 'Rewards redeemed successfully');
    }
}
