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
        $activities = AmbassadorActivity::with(['service', 'action'])->orderBy('created_at', 'desc')->get();

        // Last activity
        $lastActivity = AmbassadorActivity::with(['service', 'action'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first();

        // Total collected points
        $totalPoints = AmbassadorActivity::where('user_id', auth()->id())
            ->with('action')
            ->get()
            ->sum(function ($activity) {
                return $activity->action->value ?? 0;
            });
    	
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

    public function singleCourse($course_id){
        $course = CatalogCourse::find($course_id);
        return view('student.single-course')
            ->with('course',$course);
    }
}
