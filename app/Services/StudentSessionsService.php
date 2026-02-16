<?php

namespace App\Services;

use Cookie;
use App\AdditionalCourse;
use App\CurriculumType;

class StudentSessionsService{


    public function get_sessions(){
        $sessions = CurriculumType::whereIn('id',[12,13,14])->get();
        foreach($sessions as $session){
             if(!Cookie::has('session-count-'.$session->id)){
                 Cookie::queue('session-count-'.$session->id, 0, 60);
             }
             $session->session_count = Cookie::get('session-count-'.$session->id);
             $session->total = $session->session_count * $session->price;
             $session->formatted_total = number_format($session->total,2,'.',',');
          
        }
        return $sessions;
    }
    public function calculate_total(){
        $sessions = CurriculumType::whereIn('id',[12,13,14])->get();
        $total = 0;
        foreach($sessions as $session){
             if(!Cookie::has('session-count-'.$session->id)){
                 Cookie::queue('session-count-'.$session->id, 0, 60);
             }
             $session->session_count = Cookie::get('session-count-'.$session->id);
             $session->total = $session->session_count * $session->price;
             $session->formatted_total = number_format($session->total,2,'.',',');
             $total += $session->total;
        }

        return $total;
    }

    public function recordSesssions($student_id){
       $group_session_count = Cookie::get('session-count-12');
       $mentoring_sessions_count = Cookie::get('session-count-13');
       $coaching_sessions_count =  Cookie::get('session-count-14');

       for ($i=0; $i < $group_session_count; $i++) { 
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 12,
                'status' => 0
            ]);
       }

       for ($i=0; $i < $mentoring_sessions_count ; $i++) { 
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 13,
                'status' => 0
            ]);
       }

       for ($i=0; $i < $coaching_sessions_count; $i++) { 
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 14,
                'status' => 0
            ]);;
       }

       Cookie::queue(Cookie::forget('session-count-11'));
       Cookie::queue(Cookie::forget('session-count-12'));
       Cookie::queue(Cookie::forget('session-count-13'));

       return;
    }
}
