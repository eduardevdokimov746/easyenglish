<?php

namespace App\Containers\Auth\Mails;

use App\Ship\Parents\Mails\Mail;

class ConfirmEmailMail extends Mail
{
    public $email;
    public $link;
    public $logo;

    public function __construct($email, $link)
    {
        $this->email = $email;
        $this->link = $link;
        $this->logo = asset('images/s2.png');
    }

    public function build()
    {
        return $this->view('auth::confirm-email')
            ->with(['message' => $this]);
    }
}
