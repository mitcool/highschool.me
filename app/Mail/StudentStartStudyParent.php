<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentStartStudyParent extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $enrolled_course;
    public function __construct($parent,$enrolled_course)
    {
        $this->enrolled_course = $enrolled_course;
        $this->parent = $parent;
    }

    
    public function build()
    {
        return $this->view('email.student-start-study-parent')
            ->with('parent',$this->parent)
            ->with('enrolled_course',$this->enrolled_course);
    }
}
