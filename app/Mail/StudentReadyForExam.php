<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentReadyForExam extends Mailable
{
    use Queueable, SerializesModels;

    public $enrolled_course;
    
    public function __construct($enrolled_course)
    {
        $this->enrolled_course = $enrolled_course;
    }

    public function build()
    {
        return $this->view('email.student-ready-for-exam')
            ->with('enrolled_course',$this->enrolled_course);
    }
}
