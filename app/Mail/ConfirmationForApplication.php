<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationForApplication extends Mailable
{
    use Queueable, SerializesModels;


    public function build()
    {
        return $this->view('email.apply_confirmation_for_user')
                    ->subject('We successfully received your application!');
    }
}
