<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public function __construct($exam)
    {
       $this->exam = $exam;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        info(session()->get('timezone'));
        return $this->view('email.exam-updated')->with('exam',$this->exam);
    }
}
