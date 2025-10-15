<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyConferenceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $data;
    public $conference_details;
    public function __construct($name,$data,$conference_details)
    {
        $this->data = $data;
        $this->name = $name;
        $this->conference_details = $conference_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.apply_conference_email')
        ->subject('Confirmation for conference')
        ->with('name',$this->name)
        ->with('data',$this->data)
        ->with('conference_details',$this->conference_details);
    }
}
