<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use DB;
use Mail;

use App\User;
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
use App\HelpDesk;
use App\Exam;
use App\StudentAnswer;
use App\ExamQuestion;
use App\RelatedCourse;
use App\CourseFile;
use App\CourseVideo;
use App\SelfAssessmentQuestion;
use App\SelfAssessmentAnswer;
use App\SelfAssessmentAttempt;
use App\SelfAssessmentAttemptQuestion;
use App\Fraud;
use App\DiplomaPrintingRequest;
use App\Notification;
use App\GroupSession;
use App\MentoringSession;
use App\CoachingSession;
use App\UserGroupSession;
use App\UserMentoringSession;
use App\UserCoachingSessions;
use App\AdditionalCourse;
use App\ParentStudent;
use App\StudyMentor;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Mail\NewDiplomaPrintingRequest;
use App\Mail\ExamSubmitted;
use App\Mail\ExamSubmittedAdmin;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class StudentController extends Controller
{
    public function dashboard(){
        return view('student.welcome');
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
        $student = auth()->user();
        
        $credits = $this->calculateCredits($student->enrolled_courses,$student->student_details->track);
        $in_progress_courses =  $student->enrolled_courses
                        ->whereIn('status',[StudentEnrolledCourse::STATUS_START_STUDY,
                                            StudentEnrolledCourse::STATUS_READY_FOR_EXAM,
                                            StudentEnrolledCourse::STATUS_EXAM_APPOINTED,
                                            StudentEnrolledCourse::STATUS_EXAM_SUBMITED]);
        $completed_courses =  $student->enrolled_courses->where('status',StudentEnrolledCourse::STATUS_COMPLETED);
        $needed_mandatory_courses = $this->checkMandatoryCourses($student->enrolled_courses);
        
        #dd($in_progress_courses->first()->course->course);
        return view('student.my-courses')
            ->with('in_progress_courses', $in_progress_courses)
            ->with('completed_courses',$completed_courses)
            ->with('curriculumTypes', $curriculumTypes)
            ->with('credits',$credits)
            ->with('needed_mandatory_courses',$needed_mandatory_courses);
    }
   
    public function exams(){
        $exams = Exam::where('student_id',auth()->id())->latest()->get();
        return view('student.exams')
            ->with('exams',$exams);
    }

    public function singleExam($exam_id){
        $exam = Exam::find($exam_id);
        $questions = ExamQuestion::where('subject_id',$exam->course_id)
            ->where('type',ExamQuestion::TYPE_FINAL_EXAM)    
            ->inRandomOrder()
            ->take(10)
            ->get();
        $time_started = Carbon::parse($exam->datetime);
        $now = Carbon::now();
        #Essay
        if($exam->type == 2){
            $total_exam_seconds = 604800; // 1 week
        }
        #Disabled kid
        elseif($exam->type == 1 && $exam->student->student_details->is_disabled == 1){
            $total_exam_seconds = 18000; // 5 hours
        }
        #Regular exam
        else{
            $total_exam_seconds = 7200; // 2 hours
        }

        $now_and_exam_ends_diff = $now->diffInSeconds($time_started->addHours(2));
        $time_left = abs($total_exam_seconds - $now_and_exam_ends_diff);

        if($exam->type == 2){
            $questions = null;
        }
        return view('student.single-exam')
            ->with('time_left',$time_left)
            ->with('questions',$questions)
            ->with('exam',$exam);
    }

    public function singleExamResults($exam_id){
        $exam = Exam::find($exam_id);
        $answers = StudentAnswer::where('exam_id',$exam_id)->get();
        return view('student.exam-results')
            ->with('exam',$exam)
            ->with('answers',$answers);
    }

    public function submitExam(Request $request, $exam_id){

        $exam = Exam::find($exam_id);
        if($exam->type == 2){
             if($request->validate([
                'essay' => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            ]));
        }
               
        if($exam->type== EXAM::TYPE_ESSAY){
            $answers = $request->answers;
            foreach($answers as $question_id => $answer){
                StudentAnswer::insert([
                    'exam_id' => $exam_id,
                    'question_id' => $question_id,
                    'answer' => $answer
                ]);
            }
        }
        elseif($exam->type==2){
            $essay = $request->essay;
            $path = base_path()."/public/exams/".$exam_id;
            $filename = $this->upload_file($essay,$path);
            StudentAnswer::insert([
                'exam_id' => $exam_id,
                'question_id' => 0,
                'answer' => $filename
            ]);
           
        }
        $exam->update(['status' => Exam::STATUS_SUBMITTED ]);

        StudentEnrolledCourse::where('catalog_course_id',$exam->course_id)->where('user_id',auth()->id())->update([
            'status' => StudentEnrolledCourse::STATUS_EXAM_SUBMITED
        ]);

        $parent = ParentStudent::where('student_id',auth()->id())->first()->parent;

        try{
            Mail::to($parent->email)->send(new ExamSubmitted($parent,$exam));
        }catch(\Exception $e){
            info($e->getMessage());
        }
        
        try{
            Mail::to(self::MATHIAS_EMAIL)->send(new ExamSubmittedAdmin($exam));
        }catch(\Exception $e){
            info($e->getMessage());
        }

        
        return redirect()->route('student.exams')
            ->with('success_message','You successfully submitted your exam');
    }

    public function failExam($exam_id){
        $exam = Exam::find($exam_id);
        if($exam->status == 0){
            $exam->update([
            'status' => Exam::STATUS_EVALUATED,
            'grade' => 0
        ]);
        }
        return;
    }

    public function singleCourse($course_id) {
        $enrolled_course = StudentEnrolledCourse::where('user_id',auth()->id())->where('catalog_course_id',$course_id)->first();
        if(!$enrolled_course){
            abort(403);
        };
        
        $materials = CourseFile::where('course_id', $enrolled_course->course->course_id)->get();
        $videos = CourseVideo::where('course_id', $enrolled_course->course->course_id)->get();

        return view('student.single-course')
            ->with('enrolled_course',$enrolled_course)
            ->with('materials', $materials)
            ->with('videos', $videos);
    }

    public function singleMaterial(Request $request, $material_id) {
        $file = CourseFile::where('id', $material_id)->firstOrFail();

        $url = trim((string) $file->stored_path);

        $iframeUrl = $this->normalizeFileUrlForIframe($file->stored_path);

        return view('student.single-material')
            ->with('file', $file)
            ->with('iframeUrl', $iframeUrl);
    }

    private function normalizeFileUrlForIframe(string $url): string {
        $url = trim($url);

        // If it's already a drive preview link, keep it
        if (str_contains($url, 'drive.google.com') && str_contains($url, '/preview')) {
            return $url;
        }

        // Extract file ID from common Google Drive share URL formats
        // Examples:
        // https://drive.google.com/file/d/FILE_ID/view?usp=sharing
        // https://drive.google.com/open?id=FILE_ID
        // https://drive.google.com/uc?id=FILE_ID&export=download

        $fileId = null;

        // /file/d/{id}/...
        if (preg_match('~/file/d/([a-zA-Z0-9_-]+)~', $url, $m)) {
            $fileId = $m[1];
        }

        // ?id={id}
        if (!$fileId) {
            $parsed = parse_url($url);
            parse_str($parsed['query'] ?? '', $q);
            if (!empty($q['id'])) {
                $fileId = $q['id'];
            }
        }

        // If we got an ID, return iframe preview URL
        if ($fileId) {
            return "https://drive.google.com/file/d/{$fileId}/preview";
        }

        // Not a drive link (or unknown format) — return as-is
        return $url;
    }

    public function singleVideo(Request $request, $video_id) {
        $video = CourseVideo::where('id', $video_id)->firstOrFail();

        $embedUrl = $this->youtubeEmbedUrl($video->url);

        if (!$embedUrl) {
            return back()->with('success_message', 'Invalid YouTube URL.');
        }

        return view('student.single-video')->with('video', $video)->with('embedUrl', $embedUrl);
    }

    private function youtubeEmbedUrl(string $url): ?string {
        $url = trim($url);
        if ($url === '') return null;

        $parsed = parse_url($url);
        $host = $parsed['host'] ?? '';
        $path = $parsed['path'] ?? '';
        $query = $parsed['query'] ?? '';

        $id = null;

        // youtu.be/VIDEO_ID
        if (str_contains($host, 'youtu.be')) {
            $id = ltrim($path, '/');
        }

        // youtube.com/watch?v=VIDEO_ID
        if (!$id && str_contains($host, 'youtube.com')) {
            // /embed/VIDEO_ID
            if (str_starts_with($path, '/embed/')) {
                $id = substr($path, strlen('/embed/'));
            }
            // /shorts/VIDEO_ID
            elseif (str_starts_with($path, '/shorts/')) {
                $id = substr($path, strlen('/shorts/'));
            }
            // /watch?v=VIDEO_ID
            else {
                parse_str($query, $q);
                $id = $q['v'] ?? null;
            }
        }

        // sanitize
        $id = $id ? preg_replace('/[^a-zA-Z0-9_\-]/', '', $id) : null;
        if (!$id) return null;

        // normal embed
        return "https://www.youtube.com/embed/{$id}";
    }


    public function studyMentor(){
        if(auth()->user()->student_details->track == 4){
            $categories_ids = [];
            foreach(auth()->user()->enrolled_courses as $enrolled_course){
                $categories_ids[] = $enrolled_course->course->category_id;
            }
           
            $study_mentors = StudyMentor::whereIn('category_id',$categories_ids)->get();
        }
        else{
            $study_mentors = StudyMentor::all();
        }
        
        return view('student.study-mentor')
            ->with('study_mentors',$study_mentors);
    }

    public function singleStudyMentor($slug){
        $mentor = StudyMentor::where('slug',$slug)->first();
        return view('student.single-study-mentor')
            ->with('mentor',$mentor);
    }

    public function singleStudyMentorChat($slug){
        $mentor = StudyMentor::where('slug',$slug)->first();
        session()->forget('conversation');
        return view('student.single-study-mentor-chat')
            ->with('mentor',$mentor);
    }
    public function singleStudyMentorChatPost(Request $request){
        $user_tokens = auth()->user()->student_details->tokens;
        if($user_tokens <= 0){
            return ['answer'=> 'You have no questions left. Please contact the support team','tokens_left' => 0];
        }
        $conversation = session()->has('conversation') ? session()->get('conversation') : [];
        $request->validate([
            'message' => 'required|string',
        ]);
        $message = $request->message;
        $question = [
            'role'=>'system',
            'content' => $message
        ];
        $conversation[] = $question;
        $response = Http::withToken(config('services.openai.key'))
        ->post('https://api.openai.com/v1/responses',[ 
                'model' => 'gpt-5.2',
                'input' => $conversation
        ]);

       
        $user_tokens = auth()->user()->student_details->tokens;
        $tokens_left = $user_tokens - 1;
        auth()->user()->student_details->update(['tokens'=>$tokens_left]);
        $answer = $response['output'][0]['content'][0]['text']; 
        $conversation[] = [
            'role' => 'system',
            'content' => $answer
        ];
        session()->put('conversation',$conversation);
        return ['answer'=>$answer,'tokens_left' => $tokens_left];
        
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

    public function selfAssessmentTest($material_id) {
        $user = auth()->user();
        $now = Carbon::now();

        // Find existing active attempt
        $attempt = SelfAssessmentAttempt::where('user_id', $user->id)
            ->where('material_id', $material_id)
            ->first();
       
        // Already coompleted - review mode
        if ($attempt && $attempt->completed) {

            $attemptQuestions = SelfAssessmentAttemptQuestion::where('attempt_id', $attempt->id)
                ->with(['question.answers', 'selectedAnswer'])
                ->get();

            
            $totalQuestions = $attemptQuestions->count();

            $correctAnswers = 0;
            $totalPoints = 0; // 1 point per correct answer
            
            foreach($attemptQuestions as $aq){
                if($aq->selectedAnswer && $aq->selectedAnswer->is_correct == 1){
                    $correctAnswers+=1;
                    $totalPoints+=1;
                }
                
            }
            return view('student.self-assessment-review', [
                'attempt' => $attempt,
                'attemptQuestions' => $attemptQuestions,
                'totalQuestions' => $totalQuestions,
                'correctAnswers' => $correctAnswers,
                'totalPoints' => $totalPoints,
            ]);
        }

        // FIRST TIME opening the test
        if (!$attempt) {

            $attempt = SelfAssessmentAttempt::create([
                'user_id' => $user->id,
                'material_id' => $material_id,
                'started_at' => $now,
                'ends_at' => $now->copy()->addHour(), // 1 hour
            ]);

            // Pick 10 random questions for this material
            $questions = SelfAssessmentQuestion::where('material_id', $material_id)
                ->inRandomOrder()
                ->limit(10)
                ->get();

            foreach ($questions as $question) {
                SelfAssessmentAttemptQuestion::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                ]);
            }
          
        }

        // If time expired → auto-finish
        if ($now->greaterThanOrEqualTo($attempt->ends_at)) {
            return redirect()->route('student.self-assessment-test-submit', $attempt->id);
        }
        
        
        // Load SAME questions every time
        $questions = SelfAssessmentAttemptQuestion::where('attempt_id', $attempt->id)
            ->with(['question.answers'])
            ->get()
            ->pluck('question');

        // Remaining time in seconds
        $remainingSeconds = $now->diffInSeconds($attempt->ends_at);

        return view('student.self-assessment-test', [
            'questions' => $questions,
            'duration' => $remainingSeconds, // seconds, not minutes
            'attempt' => $attempt,
        ]);
    }

    public function submitSelfAssessmentTest(Request $request, $attemptId) {
        $attempt = SelfAssessmentAttempt::where('id', $attemptId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Prevent resubmission and if ready it will redirect to the review of the test
        if ($attempt->completed) {
            return redirect()
                ->route('student.self-assessment-test', $attempt->material_id);
        }

        $answers = $request->input('answers', []);

        // Save answers (only for questions in this attempt)
        foreach ($answers as $questionId => $answerId) {
            SelfAssessmentAttemptQuestion::where('attempt_id', $attempt->id)
                ->where('question_id', $questionId)
                ->update([
                    'selected_answer_id' => $answerId,
                ]);
        }

        // Calculate score
        $score = SelfAssessmentAttemptQuestion::where('attempt_id', $attempt->id)
            ->whereHas('selectedAnswer', function ($q) {
                $q->where('is_correct', 1);
            })
            ->count();

        // Calculate total points (1 point per correct answer)
        $totalPoints = SelfAssessmentAttemptQuestion::where('attempt_id', $attempt->id)
            ->whereHas('selectedAnswer', function ($q) {
                $q->where('is_correct', 1);
            })
            ->count();

        // Mark attempt as completed
        $attempt->update([
            'score' => $score,
            'completed' => 1,
        ]);

        // TODO::Check from Vasko
        AmbassadorActivity::insert([
            'link' => 'Points from Self Assessment Test',
            'user_id'=> auth()->id(),
            'redeem_points'=> $score,
            'created_at' => Carbon::now()
        ]);

        return redirect()
            ->route('student.self-assessment-test', $attempt->material_id);
    }

    public function selfAssessmentTestReview() {

        return view('student.self-assessment-review');
    }
    public function preExam($exam_id){
        $exam = Exam::find($exam_id);
        $questions = ExamQuestion::where('subject_id',$exam->course_id)
                                ->inRandomOrder()
                                ->take(10)
                                ->where('type',ExamQuestion::TYPE_PRE_EXAM)
                                ->get();
        
        $exam->update([
            'pre_exam' => 1
        ]);
        return view('student.pre-exam')
            ->with('questions',$questions);
       
    }

    public function submitPreExam(){
        return redirect()->route('student.exams')->with('success_message','Pre exam submitted successfully');
    }

    public function diplomas(){
        $diploma_request = DiplomaPrintingRequest::where('student_id',auth()->id())->first();
        $student = auth()->user();
        if($student->student_details->track == 3){
            $credits = $this->checkTransferProgramDiploma($student->enrolled_courses);
         
        }
        else{
            $credits = $this->calculateCredits($student->enrolled_courses,$student->student_details->track);
        }
        
        return view('student.diplomas')
            ->with('diploma_request',$diploma_request)
            ->with('credits',$credits)
            ->with('student',$student);
    }

    public function generatePdfDiploma($student_id){
        $student = User::find($student_id);
        if($student->student_details->track == 3){
            $credits = $this->checkTransferProgramDiploma($student->enrolled_courses);
         
        }
        else{
            $credits = $this->calculateCredits($student->enrolled_courses,$student->student_details->track);
        }
        $pdf = Pdf::loadView('student.diploma-pdf',['student' => $student,'credits' => $credits])->set_option('isRemoteEnabled',true)->setPaper('a4','landscape');
        return $pdf->stream();
    }
    public function requestDiplomaCopy(){
        $copy_fee = 250;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Application fee',
                        ],
                        'unit_amount'  =>  $copy_fee*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('request-diploma-copy-success'),
            'cancel_url'  => route('student.diplomas'),
        ]);
        return redirect()->away($session->url);
    }

    public function requestDiplomaCopySuccess(){
        $diploma_request = DiplomaPrintingRequest::create(['student_id' => auth()->id(),'status' => 0]);
        $admin = User::where('role_id',1)->first();
        try{
            Mail::to($admin->email)->send(new NewDiplomaPrintingRequest($diploma_request));
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->route('student.diplomas')
            ->with('success_message','Diploma copy requested successfully');
    }

    public function digitalTransript($student_id){
        $student = User::with('student_details','exams')->find($student_id);
        $exams = Exam::where('status',2)
            ->where('grade','>',1)
            ->get()
            ->groupBy(function ($item) {
                return $item->date->format('Y'); // group by month
            });

        $pdf = Pdf::loadView('student.transcript-pdf',[ 'student'=> $student,'exams' => $exams ])->set_option('isRemoteEnabled',true)->setPaper('a4');
        return $pdf->stream();
    }

    public function showNotifications() {
        // Mark all unread as read WHEN opening the page
        Notification::where('user_id', auth()->id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        // Load notifications
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->paginate(20);

        return view('student.all-notifications')->with('notifications', $notifications);
    }

    public function recordFraud(Request $request){
        $fraud = ($request->only('exam_id','name'));
        if(Fraud::where('exam_id',$fraud['exam_id'])->where('name',$fraud['name'])->count()==0){
            Fraud::create($fraud);
        }
        return 1;
    }

    public function meetings(){
         $now = Carbon::now();
      
         $group_sessions = GroupSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();

        $mentoring_sessions = MentoringSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();
       
        $coaching_sessions = CoachingSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();

        $user_group_sessions = UserGroupSession::where('user_id',auth()->id())->pluck('session_id')->toArray();
        $user_mentoring_sessions = UserMentoringSession::where('user_id',auth()->id())->pluck('session_id')->toArray();
        $user_coaching_sessions = UserCoachingSessions::where('user_id',auth()->id())->pluck('session_id')->toArray();
        $student_id = auth()->id();
        $permissions = $this->checkPermissionForSessionBooking($student_id);
      
        return view('student.meetings')
            ->with('group_sessions',$group_sessions)
            ->with('user_group_sessions',$user_group_sessions)
            ->with('mentoring_sessions',$mentoring_sessions)
            ->with('user_mentoring_sessions',$user_mentoring_sessions)
            ->with('user_coaching_sessions',$user_coaching_sessions)
            ->with('permissions',$permissions)
            ->with('coaching_sessions',$coaching_sessions)
            ->with('student_id',$student_id);
    }

    public function checkPermissionForSessionBooking($student_id){
        $coaching_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',14)->count() > 0){
            $coaching_sessions_permission = true;
        }
        $mentoring_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',13)->count() > 0){
            $mentoring_sessions_permission = true;
        }
        $group_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',12)->count() > 0){
            $group_sessions_permission = true;
        }
        $permissions = [
            'coaching' => $coaching_sessions_permission,
            'mentoring' => $mentoring_sessions_permission,
            'group' => $group_sessions_permission
        ];
        return $permissions;
    }
       
}
