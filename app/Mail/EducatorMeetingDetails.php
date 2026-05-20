<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EducatorMeetingDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $meetings;
    public $educator;
    public function __construct($educator,$meetings)
    {
        $this->meetings = $meetings;
        $this->educator = $educator;
    }

    public function build()
    {
        return $this->view('email.educator-meeting-details')
            ->with('educator',$this->educator)
            ->with('meetings',$this->meetings);
    }
}
