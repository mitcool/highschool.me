<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SessionReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $session;

    public function __construct($session,$student)
    {
        $this->student = $student;
        $this->session = $session;
    }

    public function build()
    {
        return $this->view('email.session-reminder')
            ->with('student',$this->student)
            ->with('session',$this->session);
    }
}
