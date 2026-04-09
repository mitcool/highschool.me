<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginPinCode extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pinCode;

    public function __construct(User $user, $pinCode)
    {
        $this->user = $user;
        $this->pinCode = $pinCode;
    }

    public function build()
    {
        return $this->view('email.login-pin')
            ->subject('Your login PIN code')
            ->with([
                'user' => $this->user,
                'pinCode' => $this->pinCode,
            ]);
    }
}
