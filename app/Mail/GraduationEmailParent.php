<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GraduationEmailParent extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;

    public function __construct($parent,$student)
    {
        $this->parent = $parent;
        $this->student =$student;
    }

    public function build()
    {
        return $this->view('email.graduation-email-parent')
            ->with('parent',$this->parent)
            ->with('student',$this->student);
    }
}
