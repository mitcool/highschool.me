<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamDeleted extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public function __construct($exam)
    {
        $this->exam = $exam;
    }

    public function build()
    {
        return $this->view('email.exam-deleted')
            ->subject('Your '.$this->exam->course->course->title .' Has Been Rescheduled — A New Date Is On Its Way')
            ->with('exam',$this->exam);
    }
}
