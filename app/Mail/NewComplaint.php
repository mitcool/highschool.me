<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewComplaint extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public function __construct($complaint)
    {
        $this->complaint = $complaint;
    }
    public function build()
    {
        return $this->view('email.new-complaint')
            ->with('complaint',$this->complaint);
    }
}
