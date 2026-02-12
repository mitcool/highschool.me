<?php

namespace App\Services;

use Cookie;

use App\PaidGroupSession;
use App\PaidMentoringSession;
use App\PaidCoachingSession;
use App\CurriculumType;
use App\AdditionalCourse;

class StudentModuleCourseService{

    public function get_courses(){
        $courses_types = CurriculumType::where('id','!=',11)->get();
        foreach($courses_types as $course_type){
             if(!Cookie::has('course-type-count-'.$course_type->id)){
                 Cookie::queue('course-type-count-'.$course_type->id, 0, 60);
             }
             $course_type->course_type_count = Cookie::get('course-type-count-'.$course_type->id) ?? 0;
             $course_type->total = $course_type->course_type_count * $course_type->price;
             $course_type->formatted_total = number_format($course_type->total,2,'.',',');
          
        }
        
        return $courses_types;
    }

    public function calculate_total(){
        $courses_types = CurriculumType::where('id','!=',11)->get();
        $total = 0;
        foreach($courses_types as $courses_type){
             if(!Cookie::has('course-type-count-'.$courses_type->id)){
                 Cookie::queue('course-type-count-'.$courses_type->id, 0, 60);
             }
             $courses_type->courses_type_count = Cookie::get('course-type-count-'.$courses_type->id);
             $courses_type->total = $courses_type->courses_type_count * $courses_type->price;
             $courses_type->formatted_total = number_format($courses_type->total,2,'.',',');
             $total += $courses_type->total;
        }

        return $total;
    }

    public function recordCourses($student_id){
        $courses_types = CurriculumType::where('id','!=',11)->get();
        foreach($courses_types as $courses_type){
             if(Cookie::has('course-type-count-'.$courses_type->id)){
                 $booked_courses = Cookie::get('course-type-count-'.$courses_type->id);
                 for ($i=0; $i < $booked_courses; $i++) { 
                     AdditionalCourse::insert([
                        'student_id' => $student_id,
                        'course_type' => $courses_type->id,
                        'status' => 0
                     ]);
                    # 2 Personal mentoring sessions for every course
                    for ($i=0; $i <  2; $i++) { 
                        AdditionalCourse::insert([
                            'student_id' => $student_id,
                            'course_type' => 12, // mentoring session id
                            'status' => 0
                        ]);
                    }
                 }
                 
                 
             }
             Cookie::queue(Cookie::forget('course-type-count-'.$courses_type->id));
        }
    }
}