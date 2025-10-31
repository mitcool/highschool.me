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
        //TODO:: Validation
         $data = $request->only('name','email');
         $password  = Str::random(10);
         $student_role_id = 4;
         $student = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $student_role_id,
            'password' => Hash::make($password),
        ]);

        ParentStudent::where('parent_id','student_id')->delete();
        ParentStudent::insert([
            'student_id' => $student->id,
            'parent_id' => auth()->id()
        ]);
         //TODO:: Email
        return redirect()->back()->with('success_message','Student account created successfuly');
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
}
