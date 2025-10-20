<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function highSchoolPrograms(){
        return view('pages.academics.highschool-programs');

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
