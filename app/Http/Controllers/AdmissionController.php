<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function admissionProcess(){
        return view('pages.admissions.admission-process');
    }
     public function enrolmentCriteria(){
        return view('pages.admissions.enrolment-criteria');
    }
     public function enrolmentOptions(){
        return view('pages.admissions.enrolment-options');
    }
     public function tuition(){
        return view('pages.admissions.tuition');
    }
     public function tuitionAssistance(){
        return view('pages.admissions.tuition-assistance');
    }
     public function apply(){
        return view('pages.admissions.apply');
    }
     public function loyalityProgram(){
        return view('pages.admissions.loyality-program');
    }
     public function iso(){
        return view('pages.admissions.iso');
    }
     
}
