<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingConfirmationEducator extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public $educator;
    public $student;

    public function __construct($educator,$student,$meeting)
    {
        $this->educator = $educator;
        $this->student = $student;
        $this->meeting = $meeting;
    }

    public function build()
    {
        return $this->view('email.meeting-confirmation-educator')
            ->subject('You Have Been Assigned a Meeting — '.$this->meeting->start->format('d.m.Y').' at '. $this->meeting->start->format('H:i').' (UTC)')
            ->with('educator',$this->educator)
            ->with('student',$this->student)
            ->with('meeting',$this->meeting);
    }
}
