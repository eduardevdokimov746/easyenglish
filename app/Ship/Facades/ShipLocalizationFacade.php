<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class ShipLocalizationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\Localization::class;
    }
}
