<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Academic;

class AboutController extends Controller
{
  public function showHighschoolOverview(Request $request){
    return view('pages.about.highschool-overview');
  }
  public function showMissionStatement(Request $request){
    return view('pages.about.mission-statement');
  }
  public function showAccreditation(Request $request){

    return view('pages.about.accreditation');
  }
  public function showLeadership(Request $request){
    return view('pages.about.leadership');
  }
  public function showAcademics(){
     $academics = Academic::all();
     return view('pages.about.academics')->with('academics',$academics);
  }
  public function showStudentsInSpotlight(){
    return view('pages.about.students-in-spotlight');
  }
  public function showPartnership(){
    $partners = Partner::all();
    return view('pages.about.partnership')
      ->with('partners',$partners);
  }
}
