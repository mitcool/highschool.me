<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\CurriculumType;
use App\StudentEnrolledCourse;
use App\CurriculumCourse;
use App\User;
use App\AdditionalCourse;
use App\EducatorCourse;

class EducatorCoursesTable extends Component
{

   
    public $curriculumTypes;
    public $educator_courses;
    public $pending_courses;

    public function __construct()
    {
        $this->pending_courses  = EducatorCourse::where('educator_id',auth()->id())->where('status',0)->pluck('course_id')->toArray();
        $this->educator_courses = EducatorCourse::where('educator_id',auth()->id())->where('status',1)->pluck('course_id')->toArray();
        $this->curriculumTypes = CurriculumType::with([
            'categories' => function ($q) {
                $q->orderBy('_order');
            },
            'categories.curriculumCourses.course',
            'curriculumCourses.course'
        ])->orderBy('id')->get();
    }


    public function render()
    {
        return view('components.educator-courses-table');
    }
}
