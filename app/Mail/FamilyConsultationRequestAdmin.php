<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FamilyConsultationRequestAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.family-consultation-request-admin')->with('parent',$this->parent);
    }
}
