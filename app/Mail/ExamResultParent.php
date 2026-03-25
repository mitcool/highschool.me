<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamResultParent extends Mailable
{
    use Queueable, SerializesModels;

    public $exam;
    public $parent;
    public function __construct($exam,$parent)
    {
        $this->exam = $exam;
        $this->parent = $parent;
    }

    public function build()
    {
        return $this->view('email.exam-result-parent')
            ->with('parent',$this->parent)
            ->with('exam',$this->exam);
    }
}
