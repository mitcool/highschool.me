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

    public $leave;
    public function __construct($leave) {
        $this->leave = $leave;
        
    }

    public function build() {   
        $subject = $this->leave->status == 1 
            ? 'Absence Request Approved — '.$this->leave->student->name 
            : 'Absence Request — '.$this->leave->student->name.' — Unable to Approve at This Time';
        $parent = $this->leave->student->student_details->parent;
        return $this->view('email.leave-request-answer')
                    ->subject($subject)
                    ->with('parent',$parent)
                    ->with(['leave' => $this->leave]); 
    }
}
