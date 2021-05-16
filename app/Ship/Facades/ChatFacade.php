<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class ChatFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\Chat::class;
    }
}
