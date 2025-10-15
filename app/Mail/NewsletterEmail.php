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
        if($this->newsletter->receiver->lang == 0){
            return $this->view('email.newsletter-german')
            ->with('newsletter', $this->newsletter)
            ->subject($this->newsletter->subject_de);
        }
        return $this->view('email.newsletter')
            ->with('newsletter', $this->newsletter)
            ->subject($this->newsletter->subject);
    }
}
