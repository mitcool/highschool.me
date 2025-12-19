<?php

namespace App\Services;

use Cookie;

use App\PaidGroupSession;
use App\PaidMentoringSession;
use App\PaidCoachingSession;
use App\CourseType;

class StudentSessionsService{


    public function get_sessions(){
        $sessions = CourseType::where('type',3)->get();
        foreach($sessions as $session){
             if(!Cookie::has('session-count-'.$session->id)){
                 Cookie::queue('session-count-'.$session->id, 1, 60);
             }
             $session->session_count = Cookie::get('session-count-'.$session->id);
             $session->total = $session->session_count * $session->price;
             $session->formatted_total = number_format($session->total,2,'.',',');
          
        }
        return $sessions;
    }
    public function calculate_total(){
        $sessions = CourseType::where('type',3)->get();
        $total = 0;
        foreach($sessions as $session){
             if(!Cookie::has('session-count-'.$session->id)){
                 Cookie::queue('session-count-'.$session->id, 1, 60);
             }
             $session->session_count = Cookie::get('session-count-'.$session->id);
             $session->total = $session->session_count * $session->price;
             $session->formatted_total = number_format($session->total,2,'.',',');
             $total += $session->total;
        }

        return $total;
    }

    public function recordSesssions($student_id){
       $group_session_count = Cookie::get('session-count-11');
       $mentoring_sessions_count = Cookie::get('session-count-12');
       $coaching_sessions_count =  Cookie::get('session-count-13');

       for ($i=0; $i < $group_session_count; $i++) { 
            PaidGroupSession::insert([
                'student_id' => $student_id,
                'parent_id' => auth()->user()->id,
                'status' => 0,
            ]);
       }

       for ($i=0; $i < $mentoring_sessions_count ; $i++) { 
            PaidMentoringSession::insert([
                'student_id' => $student_id,
                'parent_id' => auth()->user()->id,
                'status' => 0,
            ]);
       }

       for ($i=0; $i < $coaching_sessions_count; $i++) { 
            PaidCoachingSession::insert([
                'student_id' => $student_id,
                'parent_id' => auth()->user()->id,
                'status' => 0,
            ]);
       }

       Cookie::queue(Cookie::forget('session-count-11'));
       Cookie::queue(Cookie::forget('session-count-12'));
       Cookie::queue(Cookie::forget('session-count-13'));

       return;
    }
}
