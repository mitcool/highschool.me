<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\CurriculumType;
use App\StudentEnrolledCourse;
use App\CurriculumCourse;
use App\User;
use App\AdditionalCourse;

class EnrollmentTable extends Component
{

    public $student;
    public $curriculumTypes;
    public $enrolled_courses;
    public $enrolled_courses_ids;
    public $in_progress_courses_ids;
    public $completed_courses_ids;
    public $track;
    public $transfer_program_courses;

    public function __construct(User $student)
    {
        $this->curriculumTypes = CurriculumType::with([
            'categories' => function ($q) {
                $q->orderBy('order');
            },
            'categories.curriculumCourses.course',
            'curriculumCourses.course'
        ])->orderBy('id')->get();
        $this->enrolled_courses = StudentEnrolledCourse::where('user_id',$student->id)->get();
        $this->enrolled_courses_ids = $this->enrolled_courses->pluck('catalog_course_id')->toArray();
        $this->completed_courses_ids = $this->enrolled_courses->where('status',StudentEnrolledCourse::STATUS_COMPLETED)->pluck('catalog_course_id')->toArray();
        $this->in_progress_courses_ids = $this->enrolled_courses->where('status','<',StudentEnrolledCourse::STATUS_COMPLETED)->pluck('catalog_course_id')->toArray();
        $this->student = $student;
        $this->track = $this->student->student_details->track;
        
        $this->transfer_program_courses = CurriculumCourse::where('curriculum_type_id',11)->get();

        foreach($this->curriculumTypes as $type){
            
            if($type->id == 1 || $type->id == 2){
                if($student->student_details->track == 4 || $student->student_details->track == 5){
                    $additional_courses_count = AdditionalCourse::where('student_id',$student->id)
                    ->where('course_type',$type->id)
                    ->where('status',0)
                    ->count();
                    $type->permission = $additional_courses_count > 0 ? true : false;
                   
                }
                else{
                    $type->permission = true;
                }
                
            }
            else{
                $additional_courses_count = AdditionalCourse::where('student_id',$student->id)
                    ->where('course_type',$type->id)
                    ->where('status',0)
                    ->count();
                
                $type->permission = $additional_courses_count > 0 ? true : false;
            }
        }

        
        if($this->track == 3){
            $core_courses_check = AdditionalCourse::where('student_id',$student->id)
                    ->where('course_type',0)
                    ->where('status',0)
                    ->count();
            $elective_courses_check = AdditionalCourse::where('student_id',$student->id)
                    ->where('course_type',1)
                    ->where('status',0)
                    ->count();
            $this->curriculumTypes[0]->permission = $core_courses_check > 0 ? true : false;
            $this->curriculumTypes[1]->permission = $elective_courses_check > 0 ? true : false;
            $this->curriculumTypes[10]->permission = true;
        }

      
    }


    public function render()
    {
        return view('components.enrollment-table');
    }
}
