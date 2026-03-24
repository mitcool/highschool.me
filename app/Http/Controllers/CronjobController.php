<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ParentStudent;

use Mail;

use App\Mail\SubscribtionExpired;
use App\Mail\SubscribtionExpirationReminder;


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

                try{
                    Mail::to($subscribtion->parent->email)->send(new SubscribtionExpired);
                }catch(\Exception $e){
                    info($e->getMessage());
                }
            }
            if(Carbon::now()->addDays(10) > Carbon::parse($subscribtion->expired_at)){
                try{
                    Mail::to($subscribtion->parent->email)->send(new SubscribtionExpirationReminder);
                }catch(\Exception $e){
                    info($e->getMessage());
                }
            }
        }
        return;
    }

    public function updateStudyMentorQuestions(){
        #student without those who book single mentoring sessions only
        $students = ParentStudent::where('track','!=',5)->get();
        if(Carbon::now()->isStartOfMonth()){
            foreach($students as $student){
                if($student->$student->active_plan){
                    #NOTE tokens == questions 
                    $tokens = $student->student->active_plan->plan_id == 3 ? 1200 : 500;
                    $student->update(['tokens' => $tokens]);
                    Notification::add($student->student_id,"Congratulations you have received new  ".$tokens. "questions for AI Study Mentor");
                }
            }
        }
    }
}
