<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meeting;

class EducatorController extends Controller
{
    public function dashboard(){

        return view('educator.dashboard');
    }

    public function meetings() {
    	$meetings = Meeting::get();

    	return view('educator.meetings')->with('meetings', $meetings);
    }
}
