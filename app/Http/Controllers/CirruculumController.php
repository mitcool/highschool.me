<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CirruculumController extends Controller
{
    public function standardHighSchool(){
            return view('pages.cirriculum.standard-highschool');
    }
    public function honorsHighSchool(){
            return view('pages.cirriculum.honors-highschool');
    }
    public function advancedPlacement(){
        return view('pages.cirriculum.advanced-placement');
    }
    public function psat(){
        return view('pages.cirriculum.psat');
    }

    public function baccalaureate(){
        return view('pages.cirriculum.baccalaureate');
    }
}
