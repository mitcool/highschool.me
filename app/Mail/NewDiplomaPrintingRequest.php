<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDiplomaPrintingRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $diploma_request;
    public function __construct($diploma_request)
    {
        $diploma_request = $this->$diploma_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.new-diploma-printing-request')
            ->with('diploma_request',$this->diploma_request);
    }
}
