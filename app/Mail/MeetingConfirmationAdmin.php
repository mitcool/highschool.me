<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingConfirmationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public $educator;
    public $student;

    public function __construct($educator,$student,$meeting)
    {
        $this->meeting = $meeting;
        $this->educator = $educator;
        $this->student = $student;
    }

    public function build()
    {
        return $this->view('email.meeting-confirmation-admin')
            ->with('student',$this->student)
            ->with('educator',$this->educator)
            ->with('meeting',$this->meeting);
    }
}
