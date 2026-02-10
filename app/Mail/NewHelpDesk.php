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
    public $slug;
    public function __construct($user,$slug)
    {
        $this->user = $user;
        $this->slug = $slug;
    }

      public function build()
    {
        return $this->view('email.new-help-desk')
            ->with('user',$this->user)
            ->with('slug',$this->slug);
    }
}
