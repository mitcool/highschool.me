<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingConfirmationParent extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
    }


    public function build()
    {
        return $this->view('email.meeting-confirmation-parent')
            ->with('meeting',$this->meeting);
    }
}
