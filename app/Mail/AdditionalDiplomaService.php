<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdditionalDiplomaService extends Mailable
{
    use Queueable, SerializesModels;

    public $diploma;
    public $type;
    public $service_type;
    
    public function __construct($diploma,$type,$service_type)
    {
        $this->diploma = $diploma;
        $this->type = $type;
        $this->service_type = $service_type;
    }
    public function build()
    {
        return $this->view('email.additional-diploma-service')
            ->with('diploma',$this->diploma)
            ->with('type',$this->type)
            ->with('service_type',$this->service_type);
    }
}
