<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseEnrolledParent extends Mailable
{
    use Queueable, SerializesModels;

    
    public $parent;
    public $student;
    public $course;

    public function __construct($parent,$student,$course)
    {
        $this->parent = $parent;
        $this->student = $student;
        $this->course = $course;
    }

    public function build()
    {
        return $this->view('email.course-enrolled-parent')
            ->with('parent',$this->parent)
            ->with('student',$this->student)
            ->with('course',$this->course);
    }
}
