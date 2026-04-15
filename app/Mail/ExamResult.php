<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamResult extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public function __construct($exam)
    {
        $this->exam = $exam;
    }

    public function build()
    {
        return $this->view('email.exam-result')
            ->subject('Your '.$this->exam.' Results Are In — See How You Did')
            ->with('exam',$this->exam);
    }
}
