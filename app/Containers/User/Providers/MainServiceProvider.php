<?php

namespace App\Containers\User\Providers;

use App\Containers\User\Extensions\Cat;
use App\Containers\User\Extensions\Dog;
use App\Containers\User\Interfaces\Animal;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\MainProvider;
use Illuminate\Support\Facades\Gate;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends MainProvider
{

    public $singletons = [
        Animal::class => Cat::class
    ];

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [
         'Animal' => \App\Containers\User\Facades\Animal::class,
    ];

    public function boot()
    {
        Gate::define('update-post', function (User $user) {
            return false;
        });

    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();



    }
}
