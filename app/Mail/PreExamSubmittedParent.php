<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreExamSubmittedParent extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $exam;
    public function __construct($parent,$exam)
    {
        $this->parent = $parent;
        $this->exam = $exam;
    }

   
    public function build()
    {
        return $this->view('email.pre-exam-submitted-parent')
            ->subject($this->exam->student->name.' Has Completed the Pre-Exam for '.$this->exam->course->course->title.' — Results Inside')
            ->with('parent',$this->parent)
            ->with('exam',$this->exam);
    }
}
