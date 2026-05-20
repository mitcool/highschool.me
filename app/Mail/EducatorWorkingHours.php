<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EducatorWorkingHours extends Mailable
{
    use Queueable, SerializesModels;

    public $working_hour;
    public function __construct($working_hour)
    {
        $this->working_hour = $working_hour;
    }

    
    public function build()
    {
        return $this->view('email.educator-working-hour')->with('working_hour',$this->working_hour)->subject($this->working_hour->educator->fullname().' Working hours for '.$this->working_hour->date);
    }
}
