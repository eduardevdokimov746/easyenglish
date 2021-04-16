<?php

namespace App\Ship\Facades;

use Illuminate\Support\Facades\Facade;

class BreadcrumbsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Ship\Services\Breadcrumbs::class;
    }
}
