<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentCreatedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;
    public function __construct($parent,$student)
    {
        $this->parent = $parent;
        $this->student = $student;
    }

    public function build()
    {
        return $this->view('email.student-created-admin')
            ->with('parent',$this->parent)
            ->subject('Documents Submitted — '.$this->student->fullname().' — Review Required');
    }
}
