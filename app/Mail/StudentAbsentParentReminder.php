<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAbsentParentReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;
    public $lastLoginAt;

    public function __construct($parent, $student, $lastLoginAt)
    {
        $this->parent = $parent;
        $this->student = $student;
        $this->lastLoginAt = $lastLoginAt;
    }

    public function build()
    {
        return $this->view('email.student-absent-parent-reminder')
            ->subject('Student Attendance Reminder from ONSITES High School')
            ->with('parent', $this->parent)
            ->with('student', $this->student)
            ->with('lastLoginAt', $this->lastLoginAt);
    }
}
