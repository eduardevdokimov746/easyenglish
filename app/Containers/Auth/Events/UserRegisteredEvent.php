<?php

namespace App\Containers\Auth\Events;

use App\Ship\Parents\Events\Event;
use App\Containers\User\Models\User;

class UserRegisteredEvent extends Event
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
