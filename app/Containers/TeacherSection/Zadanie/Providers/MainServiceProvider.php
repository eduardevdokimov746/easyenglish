<?php

namespace App\Containers\TeacherSection\Zadanie\Providers;

use App\Ship\Parents\Providers\MainProvider;

class MainServiceProvider extends MainProvider
{
    public $serviceProviders = [
        AuthServiceProvider::class,
    ];

    public function register()
    {
        parent::register();
    }
}
