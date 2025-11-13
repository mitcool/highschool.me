<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbassadorService;
use App\AmbassadorReward;

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
     public function ambassadorProgram(){
        $ambassador_services = AmbassadorService::all();
        $ambassador_rewards = AmbassadorReward::all();
        return view('pages.admissions.loyality-program')
            ->with('ambassador_rewards',$ambassador_rewards)
            ->with('ambassador_services',$ambassador_services);
    }
     public function iso(){
        return view('pages.admissions.iso');
    }
     
}
