<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EarlyRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public function __construct($registration)
    {
        $this->registration = $registration;
    }

   
    public function build()
    {
        return $this->view('email.early-registration-email')
        ->with('registration', $this->registration);
    }
}
