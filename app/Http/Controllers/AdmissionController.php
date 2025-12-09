<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbassadorService;
use App\AmbassadorReward;
use App\FeatureCategory;
use App\Plan;
use App\Course;

class AdmissionController extends Controller
{
    public function admissionProcess(){
        return view('pages.admissions.admission-process');
    }
     public function enrolmentCriteria(){
        return view('pages.admissions.enrollment-criteria');
    }
     public function enrolmentOptions(){
        return view('pages.admissions.enrollment-options');
    }
    
    public function tuition(){
      $feature_categories = FeatureCategory::all();
      $plans = Plan::all();
      $courses = Course::all();
      return view('pages.admissions.tuition')
        ->with('feature_categories',$feature_categories)
        ->with('courses',$courses)
        ->with('plans',$plans);
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
        return view('pages.admissions.ambassador-program')
            ->with('ambassador_rewards',$ambassador_rewards)
            ->with('ambassador_services',$ambassador_services);
    }
     public function iso(){
        return view('pages.admissions.iso');
    }
     
}
