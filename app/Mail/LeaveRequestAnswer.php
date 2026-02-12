<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveRequestAnswer extends Mailable
{
    use Queueable, SerializesModels;

    public $mailObject;

    public function __construct($mailObject) {
        $this->mailObject = $mailObject;
    }

    public function build() {   
        return $this->view('email.leave-request-answer')
                    ->subject('Application for leave')
                    ->with(['mailObject' => $this->mailObject]); 
    }
}
