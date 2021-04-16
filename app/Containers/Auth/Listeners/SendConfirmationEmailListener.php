<?php

namespace App\Containers\Auth\Listeners;

use App\Containers\Auth\Events\UserRegisteredEvent;
use App\Containers\Auth\Mails\ConfirmEmailMail;

class SendConfirmationEmailListener
{
    public function handle(UserRegisteredEvent $event)
    {
        $email = $event->user->email->email;
        $code = $event->user->email->confirmation_code;
        $link = route('web_confirm_email', $code);

        \Mail::to($email)->send(new ConfirmEmailMail($email, $link));
    }
}
