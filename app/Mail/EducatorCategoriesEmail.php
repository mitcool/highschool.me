<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EducatorCategoriesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $educator;
    public function __construct($educator)
    {
        $this->educator =  $educator;
    }

    public function build()
    {
        return $this->view('email.educator-categories-email')->with('educator',$this->educator);
    }
}
