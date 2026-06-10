<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FamilyConsultationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $family_consultation;
    public function __construct($family_consultation)
    {
        $this->family_consultation = $family_consultation;
    }

    public function build()
    {
        return $this->view('email.family-consultation-confirmation')
            ->with('family_confirmation',$this->family_consultation);
    }
}
