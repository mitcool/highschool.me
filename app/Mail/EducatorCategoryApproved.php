<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EducatorCategoryApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $educator_category;
    public function __construct($educator_category)
    {
        $this->educator_category = $educator_category;
    }

   
    public function build()
    {
        return $this->view('email.educator-category-approved')
            ->with('educator_category',$this->educator_category);
    }
}
