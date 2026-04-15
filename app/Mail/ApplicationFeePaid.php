<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class ApplicationFeePaid extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;
    public $now;

    public function __construct($parent,$student)
    {
        $this->parent = $parent;
        $this->student = $student;
        $this->now = Carbon::now()->format('d.m.Y');
    }

    public function build()
    {
        return $this->view('email.application-fee-paid')
             ->subject('Application Fee Received — '.$this->student->name.'\'s Application Is Now in Progress')
            ->with('parent',$this->parent)
            ->with('student',$this->student);
    }
}
