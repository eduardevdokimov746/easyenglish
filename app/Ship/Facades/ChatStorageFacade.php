<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class ChatStorageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\ChatStorage::class;
    }
}
