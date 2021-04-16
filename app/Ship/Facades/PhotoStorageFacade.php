<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class PhotoStorageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\Photo::class;
    }
}
