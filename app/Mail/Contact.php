<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_info;
    public function __construct($mail_info)
    {
        $this->mail_info = $mail_info;
    }

    public function build()
    {
        return $this->view('email.home-contact')
            ->with('data', $this->mail_info);
    }
}
