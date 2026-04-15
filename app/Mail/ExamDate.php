<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamDate extends Mailable
{
    use Queueable, SerializesModels;

    
    public $exam;
    public function __construct($exam)
    {
        $this->exam = $exam;
    }
    public function build()
    {
        
        return $this->view('email.exam-date')
            ->subject('Exam Date Confirmed —'. $exam->student->name.' Is Set for'. $exam->course->course->title)
            ->with('exam',$this->exam);
    }
}
