<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EducatorCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $educator;
    public $password;
    public function __construct($educator,$password)
    {
        $this->educator = $educator;
        $this->password = $password;
    }

    
    public function build()
    {
        return $this->view('email.educator-credentials')
            ->subject('Welcome to the ONSITES High School Team — Your Account Is Ready')
            ->with('password',$this->password)
            ->with('educator',$this->educator);
    }
}
