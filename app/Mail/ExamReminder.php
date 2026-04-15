<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public function __construct($exam)
    {
        $this->exam = $exam;
    }

    public function build()
    {
        return $this->view('email.exam-reminder')
            ->with('exam',$this->exam)
            ->subject('Your '.$this->exam->course->course->title .' Is Scheduled for '.$this->exam->datetime->format('d.m.Y').' — You Are Ready for This');
    }
}
