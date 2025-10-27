<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class AcademicsController extends Controller
{
    public function highSchoolPrograms(){
        $courses = Course::all();
        return view('pages.academics.highschool-programs')->with('courses',$courses);

    }
     public function graduationRequirements(){
        return view('pages.academics.graduation-requirements');
        
    }
     public function creditRecovery(){
        return view('pages.academics.credit-recovery');
        
    }
     public function creditTransfer(){
        return view('pages.academics.credit-transfer');
        
    }
     public function awards(){
        return view('pages.academics.awards');
        
    }
     public function internationalStudents(){
        return view('pages.academics.international-students');
        
    }
}
