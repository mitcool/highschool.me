<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationProfile extends Mailable
{
    use Queueable, SerializesModels;

    public $mailObject;

    public function __construct($mailObject)
    {
        $this->mailObject = $mailObject;
    }

    public function build()
    {
        $subject = 'Verify your account' ;
        return $this->view('email.user_verification')
                    ->subject($subject)
                    ->with(['mailObject' => $this->mailObject]);
    }
}
