<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function highSchoolPrograms(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.highschool-programs')
        ->with('texts',$texts);

    }
     public function graduationRequirements(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.graduation-requirements')
        ->with('texts',$texts);
        
    }
     public function creditRecovery(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.credit-recovery')
        ->with('texts',$texts);
        
    }
     public function creditTransfer(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.credit-transfer')
        ->with('texts',$texts);
        
    }
     public function awards(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.awards')
        ->with('texts',$texts);
        
    }
     public function internationalStudents(Request $request){
        $texts = $request->all()['texts'];
        return view('pages.academics.international-students')
        ->with('texts',$texts);
        
    }
}
