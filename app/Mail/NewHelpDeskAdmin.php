<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewHelpDeskAdmin extends Mailable
{
    use Queueable, SerializesModels;

    
    public $help_desk;
    public function __construct($help_desk)
    {
        $this->help_desk = $help_desk;
    }

    
    public function build()
    {
        return $this->view('email.new-help-desk-admin')
            ->with('help_desk',$this->help_desk)
            ->subject('New Support Request #'.$this->help_desk->slug.' — Awaiting Your Attention');
    }
}
