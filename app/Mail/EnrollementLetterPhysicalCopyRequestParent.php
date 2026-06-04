<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollementLetterPhysicalCopyRequestParent extends Mailable
{
    use Queueable, SerializesModels;

    public $copies;
    public $student;

    public function __construct($student,$copies)
    {
        $this->copies = $copies;
        $this->student = $student;
    }

    
    public function build()
    {
        return $this->view('email.enrollement-letter-physical-copy-request-parent')
            ->with('student',$this->student)
            ->with('copies',$this->copies);
    }
}
