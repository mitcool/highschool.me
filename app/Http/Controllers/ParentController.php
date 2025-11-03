<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Meeting;
use App\User;
use App\ParentStudent;

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
        
        $document1 = $request->file('document1');
        $document1_name = $document1->getClientOriginalName();
        $request->file('document1')->move(base_path()."/public/documents/".$student->id, $document1_name);
        
        $document2 = $request->file('document2');
        $document2_name = $document2->getClientOriginalName();
        $request->file('document2')->move(base_path()."/public/documents/".$student->id, $document2_name);

        $document3 = $request->file('document3');
        $document3_name = $document3->getClientOriginalName();
        $request->file('document3')->move(base_path()."/public/documents/".$student->id, $document3_name);

        ParentStudent::where('parent_id','student_id')->delete();
        ParentStudent::insert([
            'student_id' => $student->id,
            'parent_id' => auth()->id(),
            'status' => 0 #pending application fee payment
        ]);
         //TODO:: Email
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

    public function updateStudentStatus($status,$student_id){
        ParentStudent::where('student_id',$student_id)->update(['status' => $status]);
        return redirect()->route('parent.create.student')
            ->with('success_message','Payment successfull');
    }

    public function studentProfile($student_id){
        $status = ParentStudent::where('student_id',$student_id)->first()->status;
        $student = User::find($student_id);
        return view('parent.student-profile')
            ->with('student',$student)
            ->with('status',$status);
    }
}
