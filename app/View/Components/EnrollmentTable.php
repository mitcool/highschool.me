<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\CurriculumType;
use App\StudentEnrolledCourse;
use App\User;

class EnrollmentTable extends Component
{

    public $student;
    public $curriculumTypes;
    public $enrolled_courses;
    public $enrolled_courses_ids;
    

    public function __construct(User $student)
    {
        $this->curriculumTypes = CurriculumType::with([
            'categories' => function ($q) {
                $q->orderBy('name');
            },
            'categories.curriculumCourses.course',
            'curriculumCourses.course'
        ])->orderBy('id')->get();

        $this->enrolled_courses = StudentEnrolledCourse::where('user_id',$student->id)->get();
        $this->enrolled_courses_ids = $this->enrolled_courses->pluck('catalog_course_id')->toArray();
        $this->student = $student;
    }


    public function render()
    {
        return view('components.enrollment-table');
    }
}
