<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SessionBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $session;
    public $student;

    public function __construct($session,$student)
    {
        $this->session = $session;
        $this->student = $student;
    }

    
    public function build()
    {
        return $this->view('email.session-booking-confirmation')
            ->with('student',$this->student)
            ->with('session',$this->session);
    }
}
