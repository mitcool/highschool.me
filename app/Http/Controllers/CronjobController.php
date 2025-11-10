<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ParentStudent;

use Mail;


class CronjobController extends Controller
{
    #Cronjob on the server
    public function checkSubscribtions(){
        $active_student_status = 2;
        $subscribtions = ParentStudent::where('status',$active_student_status)->get();
        foreach($subscribtions as $subscribtion){
            if(Carbon::now() > Carbon::parse($subscribtion->expired_at)){
                ParentStudent::where('student_id',$subscribtion->student_id)->update([
                    'status' => 1,
                    'expired_at' => null
                ]);
            }
        }
        return;
    }
}
