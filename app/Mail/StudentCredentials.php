<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }

        public function build()
    {
         return $this->view('email.student-credentials')
            ->with('password',$this->password)
            ->with('user',$this->user);
    }
}
