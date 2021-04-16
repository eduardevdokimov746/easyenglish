<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class FileStorageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\FileStorage::class;
    }
}
