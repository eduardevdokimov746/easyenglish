<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class ChatMessageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\ChatMessage::class;
    }
}
