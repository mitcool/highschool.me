<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $password;
    public $parent;
    public function __construct($parent,$student,$password)
    {
        $this->parent = $parent;
        $this->student = $student;
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('email.student-created')
            ->with('password',$this->password)
            ->with('student',$this->student)
            ->with('parent',$this->parent)
            ->subject($this->student->name.' Is All Set — Here Are Their Login Details');
    }
}
