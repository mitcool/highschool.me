<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

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
        $confirmation_code = data_get($this->mailObject, 'confirmation_code');
        $verification_url = URL::temporarySignedRoute(
            'verify.mail',
            Carbon::now()->addHours(24),
            ['confcode' => $confirmation_code]
        );

        return $this->view('email.user_verification')
                    ->subject($subject)
                    ->with([
                        'mailObject' => $this->mailObject,
                        'verification_url' => $verification_url
                    ]);
    }
}
