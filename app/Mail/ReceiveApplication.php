<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReceiveApplication extends Mailable
{
    use Queueable, SerializesModels;

    
    public $mailObject;
    public $mailObjectNameProgram;

    public function __construct($mailObject,$mailObjectNameProgram)
    {
        $this->mailObject = $mailObject;
        $this->mailObjectNameProgram = $mailObjectNameProgram;
    }

    public function build()
    {   
		return $this->view('email.receive_apply_form')
                    ->subject('Application form about a study program')
                    ->with(['mailObject' => $this->mailObject,'mailObjectNameProgram' => $this->mailObjectNameProgram]);
      
    }
}


