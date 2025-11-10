<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Meeting;
use App\User;
use App\ParentStudent;
use App\Plan;
use App\StudentDocument;
use Mail;

use App\Mail\StudentCreated;
use App\Mail\StudentCredentials;

use Carbon\Carbon;

class ParentController extends Controller
{
    public function dashboard(){
        return view('parent.dashboard');
    }
    public function createStudent(){
        return view('parent.create-student');
    }
    public function meetings(){
        $meetings = Meeting::where('parent_id',auth()->id())->get();
        return view('parent.meetings')
            ->with('meetings',$meetings);
    }

    public function addStudent(Request $request){
        //TODO:: Validation !!!!!
         $data = $request->only('name','email');
         $password  = Str::random(10);
         $student_role_id = 4;
         $student = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $student_role_id,
            'password' => Hash::make($password),
        ]);
        $parent_id= $request->file('parent_id');
        $custody_document = $request->file('custody_document');
        $proof_of_residence= $request->file('proof_of_residence');
        $student_id= $request->file('student_id');
        $birth_certificate= $request->file('birth_certificate');
        $school_transcript= $request->file('school_transcript');
        $withdrawal_confirmation= $request->file('withdrawal_confirmation');
        $iep= $request->file('iep');

        #Parent Id (document 1) required
        $parent_id_name = $parent_id->getClientOriginalName();
        $request->file('parent_id')->move(base_path()."/public/documents/".$student->id, $parent_id_name);
        StudentDocument::insert(['file'=>$parent_id_name,'type'=>1,'student_id'=>$student->id]);
        
        #custody_document (document 2) required
        $custody_document_name = $custody_document->getClientOriginalName();
        $request->file('custody_document')->move(base_path()."/public/documents/".$student->id, $custody_document_name);
        StudentDocument::insert(['file'=>$custody_document_name,'type'=>2,'student_id'=>$student->id]);

        #proof_of_residence (document 3) required
        $proof_of_residence_name = $parent_id->getClientOriginalName();
        $request->file('proof_of_residence')->move(base_path()."/public/documents/".$student->id, $proof_of_residence_name);
        StudentDocument::insert(['file'=>$proof_of_residence_name,'type'=>3,'student_id'=>$student->id]);

        #student id (document 4) required
        $student_id_name = $parent_id->getClientOriginalName();
        $request->file('student_id')->move(base_path()."/public/documents/".$student->id, $student_id_name);
        StudentDocument::insert(['file'=>$student_id_name,'type'=>4,'student_id'=>$student->id]);

        #birth certificete (document 5) required
        $birth_certificate_name = $parent_id->getClientOriginalName();
        $request->file('birth_certificate')->move(base_path()."/public/documents/".$student->id, $birth_certificate_name);
         StudentDocument::insert(['file'=>$birth_certificate_name,'type'=>5,'student_id'=>$student->id]);

        #school transcript (document 6) required
        $school_transcript_name = $school_transcript->getClientOriginalName();
        $request->file('school_transcript')->move(base_path()."/public/documents/".$student->id, $school_transcript_name);
        StudentDocument::insert(['file'=>$school_transcript_name,'type'=>6,'student_id'=>$student->id]);

        #withdrawal_confirmation (document 7) optinal
        $withdrawal_confirmation_name = $withdrawal_confirmation->getClientOriginalName();
        $request->file('withdrawal_confirmation')->move(base_path()."/public/documents/".$student->id, $withdrawal_confirmation_name);
        StudentDocument::insert(['file'=>$withdrawal_confirmation_name,'type'=>7,'student_id'=>$student->id]);

         #withdrawal_confirmation (document 8) optinal
        $iep_name = $iep->getClientOriginalName();
        $request->file('iep')->move(base_path()."/public/documents/".$student->id, $iep_name);
        StudentDocument::insert(['file'=>$iep_name,'type'=>8,'student_id'=>$student->id]);
        
        #ParentStudent::where('parent_id','student_id')->delete();
        ParentStudent::insert([
            'student_id' => $student->id,
            'parent_id' => auth()->id(),
            'status' => 0 #pending application fee payment
        ]);
        
        try{
            Mail::to(auth()->user()->email)->send(new StudentCreated);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
            Mail::to($data['email'])->send(new StudentCredentials);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->route('application-fee',$student->id);
    }

    public function documentation(){
        return view('parent.documentation');
    }

    public function payments(){
        return view('parent.payments');
    }

    public function invoices(){
        return view('parent.invoices');
    }

    public function inquiries(){
        return view('parent.inquiries');
    }

    public function newInquiry(){
        return view('parent.new-inquiry');
    }

    public function updateStudentStatus($status,$student_id,$payment_type = null){
        $parent_student = [];
      
        if(isset($payment_type)){
            $payment_type == 0 
                ? $parent_student['expired_at'] = Carbon::now()->addMonths(1) 
                : $parent_student['expired_at']= Carbon::now()->addYears(1);
        }
        $parent_student['status'] = $status;
      
        ParentStudent::where('student_id',$student_id)->update($parent_student);
        return redirect()->route('parent.create.student')
            ->with('success_message','Payment successfull');
    }

    public function studentProfile($student_id){
        $status = ParentStudent::where('student_id',$student_id)->first()->status;
        $student = User::find($student_id);
        $plans = Plan::all();
        return view('parent.student-profile')
            ->with('student',$student)
            ->with('plans',$plans)
            ->with('status',$status);
    }

     public function parentPayPlan(Request $request, $student_id){
         $payment_type = $request->payment_type; # 0 => monthly 1 => yearly
         $plan_id = $request->plan;
         return redirect()->route('enrollment-fee',[$student_id,$plan_id,$payment_type]);

    }
}
