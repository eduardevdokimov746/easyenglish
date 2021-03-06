<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class SoundStorageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\SoundStorage::class;
    }
}
