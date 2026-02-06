<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meeting;
use App\CurriculumCourse;
use App\User;
use App\CatalogCourse;
use App\ExamQuestion;
use App\SelfAssessmentQuestion;
use App\Invoice;
use App\Exam;

class EducatorController extends Controller
{
    public function dashboard(){
        return view('educator.dashboard');
    }

    public function meetings() {
    	$meetings = Meeting::get();

    	return view('educator.meetings')->with('meetings', $meetings);
    }
    public function courses(){
        $educator = auth()->user();
        $categories = $educator->educator_categories->pluck('category_id')->toArray();
        $courses = CurriculumCourse::whereIn('category_id',$categories)->get();
        return view('educator.courses')
            ->with('courses',$courses);
    }
    public function exams(){
        $students = User::where('role_id',4)->get();
        $educators = User::where('role_id',5)->get();
        $educator = auth()->user();
        $categories = $educator->educator_categories->pluck('category_id')->toArray();
        $courses = CurriculumCourse::whereIn('category_id',$categories)->get();
            return view('educator.exams') 
            ->with('students',$students)
            ->with('educators',$educators)
            ->with('courses',$courses);
    }
    public function examQuestions(Request $request){
        $courses = CatalogCourse::get();
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
        $courses = CatalogCourse::get();
        $questions = SelfAssessmentQuestion::with('course')->orderBy('id', 'desc')->paginate(10);
        return view('educator.self-assessment')
            ->with('courses', $courses)
            ->with('questions', $questions);
    }
    public function submitions(){
        $exams = Exam::where('status',1)->where('educator_id',auth()->id())->get();
        return view('educator.submitions')
            ->with('exams',$exams);
        
    }
    public function invoices(){
        $invoices = Invoice::where('user_email',auth()->user()->email)->get();    
        return view('educator.invoices')
            ->with('invoices',$invoices);
    }

    public function resetPassPage() {
        
        return view('educator.reset-password');
    }

}
