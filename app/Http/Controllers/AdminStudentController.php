<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentStudent;

class AdminStudentController extends Controller
{
    public function studentDocuments(){
        $students = ParentStudent::where('status',0)->get();
        return view('admin.student-documents')->with('students',$students);
    }

    public function approveDocuments(Request $request,$student_id){
        $approved_status = 1;
        $is_disabled = $request->is_disabled ? 1 : 0;
        ParentStudent::where('student_id',$student_id)->update([
            'status'=> $approved_status,
            'is_disabled' =>  $is_disabled 
        ]);
        return redirect()->back()->with('success_message','Documentation has been approved');

    }
}
