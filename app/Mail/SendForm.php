<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForm extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data;

    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;

    }
    public function build()
    {

        return $this->view('email.form_send')->with('mail_data', $this->mail_data);
    }
}

