<?php

namespace App\Containers\Auth\Mails;

use App\Ship\Parents\Mails\Mail;

class RestorePasswordMail extends Mail
{
    public $email;
    public $code;
    public $logo;

    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code = $code;
        $this->logo = asset('images/s2.png');
    }

    public function build()
    {
        return $this->view('auth::restore-password')
            ->with(['message' => $this]);
    }
}
