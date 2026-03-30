<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationRejection extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;
    public $feedback;
    public function __construct($parent,$student,$feedback)
    {
        $this->parent =  $parent;
        $this->student = $student;
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.application-rejection')
            ->with('student',$this->student)
            ->with('feedback',$this->feedback)
            ->with('parent',$this->parent);
    }
}
