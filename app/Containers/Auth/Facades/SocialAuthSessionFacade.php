<?php

namespace App\Containers\Auth\Facades;

use Illuminate\Support\Facades\Facade;

class SocialAuthSessionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Containers\Auth\Services\SocialAuthSession::class;
    }
}
