<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\User;
use App\ParentStudent;
use App\StudentDocument;
use App\CurriculumCourse;
use App\StudentEnrolledCourse;

use App\Mail\WrongDocument;

class AdminStudentController extends Controller
{
    public function studentDocuments(){
        $students = ParentStudent::whereIn('status',[1,4])->get();   //pending approval or check reupload documents
        return view('admin.student-documents')->with('students',$students);
    }
    public function singleStudentDocument($student_id){
        $student = ParentStudent::where('student_id',$student_id)->first();
        return view('admin.single-student-documents')
            ->with('student',$student);
    }
    public function approveDocuments(Request $request,$student_id){
        $approved_status = 2;
        $is_disabled = $request->is_disabled ? 1 : 0;
        ParentStudent::where('student_id',$student_id)->update([
            'status'=> $approved_status,
            'is_disabled' =>  $is_disabled 
        ]);
        return redirect()->route('admin-student-documents')->with('success_message','Documentation has been approved');

    }
     public function approveSingleDocument(Request $request,$action){
        $document_id = $request->document_id;
        $student_document =  StudentDocument::find($document_id);
        $is_approved = 1;
        if($action == 'reject'){
            $is_approved = 2;
             ParentStudent::where('student_id',$student_document->student_id)->first()->update(['status' => 4]);
        };
        
        $student_document->update(['is_approved' => $is_approved]);
        $count_approved_documents = StudentDocument::where('type','<',7)
                                                    ->where('student_id',$student_document->student_id)
                                                    ->where('is_approved',1)
                                                    ->count();

        $response = [
            'document_id' => $document_id,
            'count' => $count_approved_documents
        ];
        return $response;
    }

    public function wrongDocument(Request $request){
        $parent_student = ParentStudent::where('parent_id',$request->parent_id)->first();
        $feedback = $request->feedback;
        try{
            Mail::to($parent_student->parent->email)->send(new WrongDocument($feedback,$parent_student));
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->back()->with('success_message','The feedback to parent sent successfully');
    }

    public function overview(Request $request){
        $search = $request->search;
        $students = User::where('role_id',4)->get();
        if($search){
            $students = User::where('role_id',4)
                ->with('student_details')
                ->where('name','like','%'.$search.'%')
                ->orWhere('middlename','like','%'.$search.'%')
                ->orWhere('surname','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->get();
        }
        return view('admin.student-overview')
            ->with('students',$students);
    }

    public function singleStudentProfile($student_id){
        $student = User::find($student_id);
        $student_enrolled_courses = StudentEnrolledCourse::where('user_id',$student_id)->get(); 
        $credits = $this->calculateCredits($student_enrolled_courses);
        $in_progress_courses =  $student_enrolled_courses->where('status',0);
        $completed_courses =  $student_enrolled_courses->where('status',1);
        $needed_mandatory_courses = $this->checkMandatoryCourses($student_enrolled_courses);
        return view('admin.student-profile')
            ->with('credits',$credits)
            ->with('completed_courses',$completed_courses)
            ->with('in_progress_courses',$in_progress_courses)
            ->with('student',$student);
    }
   
}
