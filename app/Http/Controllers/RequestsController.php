<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GeneralRequest;
use App\PhoneRequest;
use App\ProgramRequest;
use App\FreeFactRequest;

class RequestsController extends Controller
{
    public function generalRequests(){
        $general_requests = GeneralRequest::orderBy('created_at','desc')->paginate(10);
        return view('admin.requests.general-requests')
            ->with('general_requests',$general_requests);
    }
    public function programlRequests(){
        $general_requests = ProgramRequest::orderBy('created_at','desc')->paginate(10);
        return view('admin.requests.program-requests')
            ->with('general_requests',$general_requests);
    }
    public function phoneRequests(){
        $general_requests = PhoneRequest::orderBy('created_at','desc')->paginate(10);
        return view('admin.requests.phone-requests')
            ->with('general_requests',$general_requests);
    }
    public function factSheetRequests(){
        $general_requests = FreeFactRequest::orderBy('created_at','desc')->paginate(10);
        return view('admin.requests.fact-sheet-requests')
            ->with('general_requests',$general_requests);
    }
}
