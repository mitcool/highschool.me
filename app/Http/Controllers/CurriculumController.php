<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeatureCategory;
use App\Plan;
use App\CourseType;

class CurriculumController extends Controller
{
    public function standardHighSchool(){
      $feature_categories = FeatureCategory::all();
      $plans = Plan::all();
      $courses = CourseType::all();
            return view('pages.cirriculum.standard-highschool')  
            ->with('feature_categories',$feature_categories)
            ->with('courses',$courses)
            ->with('plans',$plans);
    }

    public function transferProgram(){
      $course = CourseType::find(1);
            return view('pages.cirriculum.transfer-program')  
            ->with('course',$course);
    }
    public function honorsHighSchool(){
      $courses = CourseType::whereIn('id',[2,3])->get();
            return view('pages.cirriculum.honors-highschool') 
            ->with('courses',$courses);
    }
    public function advancedPlacement(){
        $course = CourseType::find(8);
        return view('pages.cirriculum.advanced-placement')
            ->with('course',$course);
    }
    public function psat(){
        $courses = CourseType::whereIn('id',[5,6,7,14])->get();
        return view('pages.cirriculum.psat')
            ->with('courses',$courses);
    }

    public function cte(){
        $course = CourseType::find(10);
        return view('pages.cirriculum.cte')
            ->with('course',$course);
    }
     public function clep(){
        $course = CourseType::find(9);
        return view('pages.cirriculum.clep')
            ->with('course',$course);
    }

    public function esol(){
        $course = CourseType::find(4);
        return view('pages.cirriculum.esol')
            ->with('course',$course);
    }

    public function learningMentoring(){
        $courses = CourseType::whereIn('id',[11,12,13])->get();
        return view('pages.cirriculum.learning-mentoring')
            ->with('courses',$courses);
    }
}
