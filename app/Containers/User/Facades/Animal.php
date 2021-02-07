<?php

namespace App\Containers\User\Facades;

use App\Containers\User\Extensions\Cat;
use App\Containers\User\Extensions\Dog;
use Illuminate\Support\Facades\Facade;

class Animal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Dog::class;
    }
}
