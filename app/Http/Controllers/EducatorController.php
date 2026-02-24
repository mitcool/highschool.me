<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\GroupSession;
use App\MentoringSession;
use App\CoachingSession;
use App\CurriculumCourse;
use App\User;
use App\CatalogCourse;
use App\ExamQuestion;
use App\SelfAssessmentQuestion;
use App\Invoice;
use App\Exam;
use App\Notification;
use App\EducatorCategory;
use App\SelfAssessmentAnswer;
use App\StudentEnrolledCourse;
use App\CourseFile;
use App\StudentAnswer;

class EducatorController extends Controller
{
    public function dashboard(){
        return view('educator.dashboard');
    }

    public function meetings() {
        $now = Carbon::now();
       
        $group_sessions = GroupSession::where(function ($query) use ($now) {
                $query->where('educator_id',auth()->id())->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();

        $mentoring_sessions = MentoringSession::where(function ($query) use ($now) {
                $query->where('educator_id',auth()->id())->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();
       
        $coaching_sessions = CoachingSession::where(function ($query) use ($now) {
                $query->where('educator_id',auth()->id())->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();
        
    	return view('educator.meetings')
            ->with('group_sessions', $group_sessions)
            ->with('mentoring_sessions', $mentoring_sessions)
            ->with('coaching_sessions', $coaching_sessions);
    }
    public function courses(){
        $educator = auth()->user();
        $categories = $educator->educator_categories->pluck('category_id')->toArray();
        $courses = CurriculumCourse::whereIn('category_id',$categories)->get();
        return view('educator.courses')
            ->with('courses',$courses);
    }
    public function exams(){
        $students = StudentEnrolledCourse::where('status',StudentEnrolledCourse::STATUS_READY_FOR_EXAM)->get();
        $educators = User::where('role_id',5)->get();
        $courses = CurriculumCourse::all();
        $exams = Exam::orderBy('created_at','desc')->get();
       # dd($exams);
        return view('educator.exams')
            ->with('exams',$exams)
            ->with('students',$students)
            ->with('educators',$educators)
            ->with('courses',$courses);
    }
    public function examQuestions(Request $request){
        $categories = EducatorCategory::where('educator_id',auth()->id())->pluck('category_id')->toArray();
        $courses = CurriculumCourse::whereIn('category_id',$categories)->get();
        $questions = ExamQuestion::when($request->course_id, function ($query) use ($request) {
            $query->where('subject_id', $request->course_id)->where('type',$request->type);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('educator.exam-questions')
            ->with('courses', $courses)
            ->with('questions', $questions);;
    }
    public function selfAssessment(){
        $categories = EducatorCategory::where('educator_id',auth()->id())->pluck('category_id')->toArray();
        $courses = CurriculumCourse::whereIn('category_id',$categories)->get();
        $courses_ids = $courses->pluck('course_id')->toArray();
        $questions = SelfAssessmentQuestion::with('course')
            ->whereIn('course_id',$courses_ids)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('educator.self-assessment')
            ->with('courses', $courses)
            ->with('questions', $questions);
    }
    public function submissions(){
        $exams = Exam::where('status',Exam::STATUS_SUBMITTED)->where('educator_id',auth()->id())->get();
        return view('educator.submissions')
            ->with('exams',$exams);
        
    }

     public function showSingleSubmission($exam_id){
        $answers = StudentAnswer::where('exam_id',$exam_id)->get();
        $exam = Exam::find($exam_id);
      
        return view('educator.single-submission')
            ->with('exam',$exam)
            ->with('answers',$answers); 
    }

    public function invoices(){
        $invoices = Invoice::where('user_email',auth()->user()->email)->get();    
        return view('educator.invoices')
            ->with('invoices',$invoices);
    }

    public function resetPassPage() {
        
        return view('educator.reset-password');
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

        return view('educator.all-notifications')->with('notifications', $notifications);
    }
    public function storeSelfAssessQuestion(Request $request){
        $request->validate([
            'course_id' => 'required',
            'material_id' => 'required',
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|between:0,3',
        ]);

        // Create question
        $question = SelfAssessmentQuestion::create([
            'course_id' => $request->course_id,
            'material_id' => $request->material_id,
            'question' => $request->question,
        ]);

        // Create answers
        foreach ($request->answers as $index => $answer) {
            SelfAssessmentAnswer::create([
                'question_id' => $question->id,
                'answer' => $answer,
                'is_correct' => ($index == $request->correct_answer),
            ]);
        }
        return redirect()->back()->with('success_message', 'Self-assessment question added successfully.');
    }

    public function editSelfAssessmentQuestionPage($question_id) {
        $question = SelfAssessmentQuestion::with('answers')->findOrFail($question_id);
        $courses = CatalogCourse::all();
        return view('educator.edit-self-assess-question')->with('question', $question)->with('courses', $courses);
    }

    public function editSelfAssessmentQuestion(Request $request, $id) {
        $request->validate([
            'course_id' => 'required',
            'material_id' => 'required',
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'correct_answer' => 'required|integer|between:0,3',
        ]);

        $question = SelfAssessmentQuestion::with('answers')->findOrFail($id);

        $question->update([
            'course_id' => $request->course_id,
            'material_id' => $request->material_id,
            'question' => $request->question,
        ]);

        foreach ($question->answers as $index => $answer) {
            $answer->update([
                'answer' => $request->answers[$index],
                'is_correct' => $index == $request->correct_answer
            ]);
        }

        return redirect()->back()->with('success_message', 'Question updated successfully.');
    }

    public function deleteSelfAssessmentQuestion($id) {
        $question = SelfAssessmentQuestion::with('answers')->findOrFail($id);

        // Delete all answers first
        $question->answers()->delete();

        // Then delete the question
        $question->delete();

        return redirect()->back()->with('success_message', 'Question and its answers deleted successfully.');
    }

    public function createExam(Request $request){
        $exam = $request->only('date','time','course_id','student_id','educator_id','type','pre_exam');
        $exam['status']= Exam::STATUS_APPOINTED;
        Exam::create($exam);
        return redirect()->back()->with('success_message','Exam created successfully');
    }

    public function addExamQuestionsPage(Request $request) {
        $courses = CurriculumCourse::get();
        
        $questions = ExamQuestion::when($request->course_id, function ($query) use ($request) {
           
            $query->where('subject_id', $request->course_id)->where('type',$request->type);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('educator.add-exam-questions')->with('courses', $courses)->with('questions', $questions);
    }

    public function addExamQuestion(Request $request) {
        ExamQuestion::insert([
            'subject_id' => $request->course_id,
            'question' => $request->question,
            'type' => $request->type
        ]);

        return redirect()->back()->with('success_message','Exam question added successfully');
    }

    public function editQuestionPage($question_id) {
        $question = ExamQuestion::where('id', $question_id)->first();

        return view('educator.edit-exam-question')->with('question', $question);
    }

    public function editExamQuestion(Request $request, $question_id) {
        ExamQuestion::where('id', $question_id)->update(['question' => $request->question]);

        return redirect()->back()->with('success_message','Exam question updated successfully');
    }

    public function deleteExamQuestion(Request $request) {
        ExamQuestion::where('id', $request->id)->delete();

        return redirect()->route('educator.add-exam-question')->with('success_message','Exam question deleted successfully');
    }

     public function materialsByCourse($courseId) {
        $materials = CourseFile::where('course_id', $courseId)
        ->select('id', 'label')
        ->orderBy('label')
        ->get();

        return response()->json($materials);
    }

    public function evaluateExam(Request $request,$exam_id){
        $request->validate([
            'grade' =>  ['required', 'numeric', 'between:0,5'],
        ]);
        $exam = Exam::find($exam_id);
        $grade = $request->grade;
        $exam_comment = $request->exam_comment;
        $course = StudentEnrolledCourse::where('user_id',$exam->student_id)->where('catalog_course_id',$exam->course_id)->first();
        if($exam->type == 1){
            $answers_comments = $request->answer_comment;
            foreach($answers_comments as $answer_id => $comment){
                StudentAnswer::find($answer_id)->update(['comment' => $comment]);
            }
        }
        $exam->update([
            'grade' => $grade,
            'comment'=> $exam_comment,
            'status' => Exam::STATUS_EVALUATED
        ]);
        if($grade > 1){
            $course->update(['status' => StudentEnrolledCourse::STATUS_COMPLETED]);
        }
        else{
            $course->update(['status' => StudentEnrolledCourse::STATUS_PENDING_EXAM_DATE]);
        }

        return redirect()->back()->with('success_message','Exam evaluated successfully');
        
    }
}
