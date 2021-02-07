<?php

namespace App\Containers\User\Mails;

use App\Containers\User\Models\User;
use App\Ship\Parents\Mails\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class TestMail
 */
class TestMail extends Mail implements ShouldQueue
{
    use Queueable;

    public function build()
    {
        return $this->view('user::test-mail');
    }
}
