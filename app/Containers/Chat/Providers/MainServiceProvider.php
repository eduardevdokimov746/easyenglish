<?php

namespace App\Containers\Chat\Providers;

use App\Ship\Parents\Providers\MainProvider;

class MainServiceProvider extends MainProvider
{
    public $serviceProviders = [
        AuthServiceProvider::class
    ];

    public $aliases = [
        // 'Foo' => Bar::class,
    ];

    public function register()
    {
        parent::register();

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
