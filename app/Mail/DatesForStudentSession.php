<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DatesForStudentSession extends Mailable
{
    use Queueable, SerializesModels;

    public $educator;
    public $data;
    public function __construct($educator,$data)
    {
        $this->educator = $educator;
        $this->data = $data;
    }

    public function build()
    {
        
        return $this->view('email.dates-for-student-session')
            ->with('educator',$this->educator)
            ->with('data',$this->data);
    }
}
