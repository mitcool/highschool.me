<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeatureCategory;
use App\Plan;
use App\CourseType;
use App\CurriculumCourse;

class CurriculumController extends Controller
{
    public function standardHighSchool(Request $request){
      $texts = $request->all()['texts'];
      $feature_categories = FeatureCategory::all();
      $plans = Plan::all();
      $courses = CourseType::all();
            return view('pages.curriculum.standard-highschool')  
            ->with('feature_categories',$feature_categories)
            ->with('courses',$courses)
            ->with('texts',$texts)
            ->with('plans',$plans);
    }

    public function transferProgram(Request $request){
        $texts = $request->all()['texts'];
      $course = CourseType::find(1);
            return view('pages.curriculum.transfer-program') 
            ->with('texts',$texts)
            ->with('course',$course);
    }
    public function honorsHighSchool(Request $request){
        $texts = $request->all()['texts'];
      $courses = CourseType::whereIn('id',[2,3])->get();
            return view('pages.curriculum.honors-highschool') 
            ->with('texts',$texts)
            ->with('courses',$courses);
    }
    public function advancedPlacement(Request $request){
        $texts = $request->all()['texts'];
        $course = CourseType::find(8);
        return view('pages.curriculum.advanced-placement')
        ->with('texts',$texts)
            ->with('course',$course);
    }
    public function psat(Request $request){
        $texts = $request->all()['texts'];
        $courses = CourseType::whereIn('id',[5,6])->get();
        return view('pages.curriculum.psat')
        ->with('texts',$texts)
            ->with('courses',$courses);
    }

    public function act(Request $request){
        $texts = $request->all()['texts'];
        $courses = CourseType::whereIn('id',[7,14])->get();
        return view('pages.curriculum.act')
        ->with('texts',$texts)
            ->with('courses',$courses);
    }

    public function cte(Request $request){
        $texts = $request->all()['texts'];
        $course = CourseType::find(10);
        return view('pages.curriculum.cte')
        ->with('texts',$texts)
            ->with('course',$course);
    }
     public function clep(Request $request){
        $texts = $request->all()['texts'];
        $course = CourseType::find(9);
        return view('pages.curriculum.clep')
        ->with('texts',$texts)
            ->with('course',$course);
    }

    public function esol(Request $request){
        $texts = $request->all()['texts'];
        $course = CourseType::find(4);
        return view('pages.curriculum.esol')
        ->with('texts',$texts)
            ->with('course',$course);
    }

    public function learningMentoring(Request $request){
        $texts = $request->all()['texts'];
        $courses = CourseType::whereIn('id',[11,12,13,15])->get();
        return view('pages.curriculum.learning-mentoring')
            ->with('texts',$texts)
            ->with('courses',$courses);
    }

    public function showSingleApCourse($slug){
        $course = CurriculumCourse::with('course')->find($slug);
        return view('pages.curriculum.single-ap-course')
            ->with('course',$course);
    }

    public function showSingleClepCourse($slug){
        $course = CurriculumCourse::with('course')->find($slug);
        return view('pages.curriculum.single-clep-course')
            ->with('course',$course);
    }

}
