<?php

namespace App\Containers\TeacherSection\Section\Providers;

use App\Ship\Parents\Providers\MainProvider;

class MainServiceProvider extends MainProvider
{
    public $serviceProviders = [
         AuthServiceProvider::class
    ];

    public function register()
    {
        parent::register();

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
