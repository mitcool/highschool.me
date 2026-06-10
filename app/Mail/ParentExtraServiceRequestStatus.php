<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParentExtraServiceRequestStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $printing_request;
    
    public function __construct($printing_request)
    {
        $this->printing_request = $printing_request;
    }

    public function build()
    {
        return $this->view('email.parent-extra-service-request-status')
            ->with('printing_request',$this->printing_request);
    }
}
