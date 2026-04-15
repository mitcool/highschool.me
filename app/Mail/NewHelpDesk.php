<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewHelpDesk extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $help_desk;
    public function __construct($user,$help_desk)
    {
        $this->user = $user;
        $this->help_desk = $help_desk;
    }

      public function build()
    {
        
        return $this->view('email.new-help-desk')
            ->subject('We Have Responded to Your Support Request #'.$this->help_desk->slug)
            ->with('user',$this->user)
            ->with('help_desk',$this->help_desk);
    }
}
