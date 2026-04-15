<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessfullAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $student;
    public $plan;
    public $amount;
    public function __construct($parent,$student,$plan,$amount)
    {
        $this->parent = $parent;
        $this->student = $student;
        $this->plan = $plan;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->view('email.payment-successfull-admin')
            ->with('parent',$this->parent)
            ->with('student',$this->student)
            ->with('plan',$this->plan)
            ->with('amount',$this->amount)
            ->subject('Payment Received —'. $this->student->fullname());
    }
}
