<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLeaveRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $leave_request;
    public function __construct($leave_request)
    {
        $this->leave_request = $leave_request;
    }

   
    public function build()
    {
        return $this->view('email.new-leave-request')
            ->with('leave_request',$this->leave_request)
            ->subject('Absence Request Received — '. $this->leave_request->student->fullname().' — Review Required');
    }
}
