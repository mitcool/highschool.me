<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbassadorService;
use App\AmbassadorReward;
use App\FeatureCategory;
use App\Plan;

class AdmissionController extends Controller
{
    public function admissionProcess(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.admissions.admission-process')
            ->with('texts',$texts);
    }
    public function enrolmentCriteria(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.admissions.enrollment-criteria')
            ->with('texts',$texts);
    }
    public function enrolmentOptions(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.admissions.enrollment-options')
            ->with('texts',$texts);
    }
    
    public function tuition(Request $request){
        $texts = $request->all()['texts'];
        $feature_categories = FeatureCategory::all();
        $plans = Plan::all();
        return view('pages.admissions.tuition')
            ->with('feature_categories',$feature_categories)
            ->with('texts',$texts)
            ->with('plans',$plans);
    }
    public function tuitionAssistance(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.admissions.tuition-assistance')
            ->with('texts',$texts);
    }
   
    public function ambassadorProgram(Request $request){
        $texts = $request->all()['texts'];
        $ambassador_services = AmbassadorService::all();
        $ambassador_rewards = AmbassadorReward::all();
        return view('pages.admissions.ambassador-program')
            ->with('texts',$texts)
            ->with('ambassador_rewards',$ambassador_rewards)
            ->with('ambassador_services',$ambassador_services);
    }  
}
