<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WrongDocument extends Mailable
{
    use Queueable, SerializesModels;

    public $documents;
    public $feedback;
    public $parent_student;
    public function __construct($feedback,$parent_student)
    {
        $this->documents = $parent_student->student->documents;
        $this->feedback = $feedback;
        $this->parent_student = $parent_student;
       
    }
    public function build()
    {
        return $this->view('email.wrong-document')
            ->with('feedback',$this->feedback)
            ->with('documents',$this->documents);
    }
}
