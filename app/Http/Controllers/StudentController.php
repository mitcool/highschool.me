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

use Barryvdh\DomPDF\Facade\Pdf;

use App\Mail\NewDiplomaPrintingRequest;

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
        $student = auth()->user();
        
        $credits = $this->calculateCredits($student->enrolled_courses,$student->student_details->track);
        $in_progress_courses =  $student->enrolled_courses->where('status',0);
        $completed_courses =  $student->enrolled_courses->where('status',1);
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
        $exams = Exam::where('student_id',auth()->id())->get();
        return view('student.exams')
            ->with('exams',$exams);
    }

    public function singleExam($exam_id){
        $exam = Exam::find($exam_id);
        $questions = ExamQuestion::where('subject_id',$exam->course_id)->inRandomOrder()->take(10)->get();
        
        if($exam->type == 2){
            $questions = null;
        }
        return view('student.single-exam')
            ->with('questions',$questions)
            ->with('exam',$exam);
    }


    public function submitExam(Request $request, $exam_id){
       
        $submitted_from_student = 1;
        $exam = Exam::find($exam_id);
        if($exam->type==1){
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
        $exam->update(['status' => $submitted_from_student]);
            //TODO::emails
            return redirect()->back()
                ->with('success_message','You successfully submitted your exam');
    }

    public function failExam($exam_id){
        $exam = Exam::find($exam_id);
        if($exam->status == 0){
            $exam->update([
            'status' => 2,
            'grade' => 0
        ]);
        }
        $fraud = ['exam_id' => $exam_id, 'student_id' => auth()->id()];
        Fraud::create($fraud);
        return;
    }

    public function singleCourse($course_id) {
        $course = CatalogCourse::find($course_id);

        $materials = CourseFile::where('course_id', $course_id)->get();
        $videos = CourseVideo::where('course_id', $course_id)->get();

        return view('student.single-course')->with('course',$course)->with('materials', $materials)->with('videos', $videos);
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
        return view('student.study-mentor');
    }

    public function singleStudyMentor(){
        return view('student.single-study-mentor');
    }

    public function singleStudyMentorChat(){
        session()->forget('conversation');
        return view('student.single-study-mentor-chat');
    }
    public function singleStudyMentorChatPost(Request $request){
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
        
        $answer = $response['output'][0]['content'][0]['text']; 
        $conversation[] = [
            'role' => 'system',
            'content' => $answer
        ];
        session()->put('conversation',$conversation);
        return $answer;
        
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
            $correctAnswers = $attemptQuestions->where(function ($aq) {
                return $aq->selectedAnswer && $aq->selectedAnswer->is_correct;
            })->count();
            $totalPoints = $attemptQuestions->where(function ($aq) {
                return $aq->selectedAnswer && $aq->selectedAnswer->is_correct;
            })->count(); // 1 point per correct answer

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
                                ->where('type',0)
                                ->get();
        
        $exam->update([
            'pre_exam' => 1
        ]);
        return view('student.pre-exam')
            ->with('questions',$questions);
       
    }

    public function diplomas(){
        
        $student = auth()->user();
        $credits = $this->calculateCredits($student->enrolled_courses,$student->student_details->track);        
        return view('student.diplomas');
    }

    public function generatePdfDiploma($student_id){
        $pdf = Pdf::loadView('student.diploma-pdf')->set_option('isRemoteEnabled',true)->setPaper('a4','landscape');
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
}
