<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\HelpDesk;
use App\RelatedCourse;
use App\CurriculumCourse;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function upload_file($request_file,$path){
		$filename = $request_file->getClientOriginalName();
        $request_file->move($path, $filename);
		return $filename;
	}
   
	public function unique_code($limit){
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}

	 public function setHelpDeskNumber(){
    	$next_help_desk = HelpDesk::count() == 0 ? 1 : HelpDesk::count() + 1;
        $numlength = strlen((string)$next_help_desk);
    	$help_desk_number = '00';
       
        for ($i = 3; $i <= (6 - $numlength); $i++) {
            $help_desk_number .= '0';
        }
        $help_desk_number .= $next_help_desk;
    	return $help_desk_number;
    }
    ### !-- PLEASE CHECK FOR DATABASE CHANGES !!!
    public function checkMandatoryCourses($student_enrolled_courses){

        $user_messages = [];
        $enrolled_courses_id = $student_enrolled_courses->pluck('catalog_course_id')->toArray();
        $english_language_mandatory_courses_id = CurriculumCourse::where('category_id',1)->pluck('course_id')->toArray();
        $mathematics_mandatory_courses_id = CurriculumCourse::where('category_id',2)->pluck('course_id')->toArray();
        $biology = 28;
        $phisics_and_chemistry = CurriculumCourse::whereIn('course_id',[34,37])->pluck('course_id')->toArray();
        $anatomy_and_enviroment = CurriculumCourse::whereIn('course_id',[30,31])->pluck('course_id')->toArray();
        $social_studies_courses_id = CurriculumCourse::where('category_id',4)->pluck('course_id')->toArray();
        $fine_and_practical_arts = CurriculumCourse::where('category_id',5)->pluck('course_id')->toArray();
        $physical_education = CurriculumCourse::where('category_id',6)->pluck('course_id')->toArray();

        #Category 1 English Language Arts (4 Credits)
        foreach($english_language_mandatory_courses_id as $course_id){
            $related_course_id = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(!in_array($course_id,$enrolled_courses_id) && !in_array($related_course_id,$enrolled_courses_id)){
                $user_messages[] = "You need to enroll all courses from category English language";
                break;
            }
        }

        #Category 2 Mathematics (4 Credits)
        foreach($mathematics_mandatory_courses_id as $course_id){
            $related_course_id = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(!in_array($course_id,$enrolled_courses_id) && !in_array($related_course_id,$enrolled_courses_id)){
                $user_messages[] = "You need to enroll all courses from category Mathematics";
                break;
            }
        }

        #Category 3 Science (3 Credits) Note Biology is always mandatory
        $related_biology_course_id = RelatedCourse::where('main_id',$biology)->first()->related_id ?? 0;
       
        if(!in_array($biology,$enrolled_courses_id) && !in_array($related_biology_course_id,$enrolled_courses_id)){
           
            $user_messages[] = "You need to enroll all courses from category Biology";
        }

        $check_chemistry_and_phisics = false;
        foreach($phisics_and_chemistry as $course_id){
            $related_chemistry_and_physics = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(in_array($course_id,$enrolled_courses_id) || in_array($related_chemistry_and_physics,$enrolled_courses_id)){
                $check_chemistry_and_phisics = true;
            }
        }
        if(!$check_chemistry_and_phisics){
               $user_messages[] = "You need to enroll all courses from category Physics and Chemistry";
        }

        $check_anatomy_and_enviroment = false;
        foreach($anatomy_and_enviroment as $course_id){
            $related_anatomy_and_enviroment = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(in_array($course_id,$enrolled_courses_id) || in_array($related_anatomy_and_enviroment,$enrolled_courses_id)){
                $check_anatomy_and_enviroment = true;
            }
        }

        if(!$check_anatomy_and_enviroment){
            $user_messages[] = "You need to enroll all courses from category Anatomy and enviroment";
        }

        #Category 4  Social Studies (3 Credits)
        foreach($social_studies_courses_id as $course_id){
            $related_social_studies = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(!in_array($course_id,$enrolled_courses_id) && !in_array($related_social_studies,$enrolled_courses_id)){
                $user_messages[] = "You need to enroll all courses from category Social Studies";
                break;
            }
        }

        #Category 5  Fine & Practical Arts (1 credit)
        $check_fine_and_practical_arts = false;
        foreach($fine_and_practical_arts as $course_id){
            $related_fine_and_practical_arts = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(in_array($course_id,$enrolled_courses_id) || in_array($related_fine_and_practical_arts,$enrolled_courses_id)){
                $check_fine_and_practical_arts = true;
            }
        }

        if(!$check_fine_and_practical_arts){
               $user_messages[] = "You need to enroll all courses from category Fine & Practical Arts";
        }

        #Category 6  Physical Education (1 credit)
        foreach($physical_education as $course_id){
            $related_physical_education = RelatedCourse::where('main_id',$course_id)->first()->related_id ?? 0;
            if(!in_array($course_id,$enrolled_courses_id) && !in_array($related_physical_education,$enrolled_courses_id)){
                $user_messages[] = "You need to enroll all courses from category Physical Education";
                break;
            }
        }
        
        return $user_messages;
    }
	 public function calculateCredits($student_enrolled_courses,$track){
        $credits = [];
        $core_credits = $track == 1 ? 16 : 15;
        $elective_credits = 0;
        $needed_elective_credits = $track == 1 ? 8 : 3;
        $credits['needed_credits'] = 0;
        $credits['completed_credits'] = 0;
        $credits['diploma'] = 0;
        
        foreach($student_enrolled_courses as $enrolled_course){
            $credits['needed_credits'] += $enrolled_course->course->default_credits;
            $type = CurriculumCourse::where('course_id',$enrolled_course->id)->first()->curriculum_type_id;
            if($enrolled_course->status == 1){
                if($type != 1){
                    $elective_credits +=  $enrolled_course->course->default_credits;
                }
                $credits['completed_credits'] += $enrolled_course->course->default_credits;
            }
        }
        //TODO::More checks for related courses
        if($elective_credits < $needed_elective_credits){
            $elective_credits = $needed_elective_credits;
        }
        $credits['needed_credits'] = $core_credits + $elective_credits;
        if($credits['completed_credits'] >= $credits['needed_credits']){
            $credits['diploma'] = 1;
        }
        return $credits;
    }
    

}


