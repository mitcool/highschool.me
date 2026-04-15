<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Academic;

class AboutController extends Controller
{
  public function showHighschoolOverview(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.about.highschool-overview')
        ->with('texts',$texts);
  }
  public function showMissionStatement(Request $request){
      $texts = $request->all()['texts'];
    return view('pages.about.mission-statement') 
      ->with('texts',$texts);
  }
  public function showAccreditation(Request $request){

    $texts = $request->all()['texts'];
    return view('pages.about.accreditation') 
      ->with('texts',$texts);
  }
  public function showLeadership(Request $request){
      $texts = $request->all()['texts'];
    return view('pages.about.leadership') 
      ->with('texts',$texts);
  }
  public function showAcademics(Request $request){
     $academics = Academic::all();
     $texts = $request->all()['texts'];
     return view('pages.about.academics')
      ->with('academics',$academics) 
      ->with('texts',$texts);
  }
  public function showStudentsInSpotlight(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.about.students-in-spotlight')
      ->with('texts',$texts);
  }
  public function showPartnership(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.about.partnership')
      ->with('texts',$texts);
  }
  public function showFirstIso(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.iso-2015')
      ->with('texts',$texts);
  }
  public function showSecondIso(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.iso-2018')
      ->with('texts',$texts);
  }
  public function showThirdIso(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.iso-2022') 
      ->with('texts',$texts);
  }
  public function showFloridaDepartment(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.florida-department') 
      ->with('texts',$texts);
  }
  public function showCollegeBoard(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.college-board')
    ->with('texts',$texts);
  }
  public function showUNpage(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.un-page')
      ->with('texts',$texts);
  }
  public function showACTpage(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.about.american-college-test')
      ->with('texts',$texts);
  }
}
