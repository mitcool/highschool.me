<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IntegrityViolationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public function __construct($exam)
    {
        $this->exam = $exam;
    }

    
    public function build()
    {
        return $this->view('email.integrity-violation-admin')
            ->subject('Academic Integrity Case — '.$this->exam->student->name.' '.$this->exam->student->surname.' — '.$this->exam->exam->course->course->title.' — Documentation Required')
            ->with('exam',$this->exam);
    }
}
