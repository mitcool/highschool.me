<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseBooked extends Mailable
{
    use Queueable, SerializesModels;

    public $courses;
    public $parent;
    public function __construct($courses,$parent)
    {
        $this->courses = $courses;
        $this->parent = $parent;
    }

    public function build()
    {
        return $this->view('email.course-booked')
                ->with('courses',$this->courses)
                ->with('parent',$this->parent);
    }
}
