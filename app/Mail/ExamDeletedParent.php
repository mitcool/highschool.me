<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamDeletedParent extends Mailable
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
        return $this->view('email.exam-deleted-parent')
            ->with('exam',$this->exam)
            ->with('parent',$this->parent);
    }
}
