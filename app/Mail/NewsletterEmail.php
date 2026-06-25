<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
   
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
        
    }

    public function build()
    {

        return $this->view('email.newsletter')
            ->with('newsletter', $this->newsletter)
            ->subject($this->newsletter->subject);
    }
}
