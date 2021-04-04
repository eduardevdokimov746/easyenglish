<?php

namespace App\Containers\Auth\Providers;

use App\Ship\Parents\Providers\MainProvider;
use App\Containers\Auth\Guards\CustomGuard;
use App\Containers\Auth\AuthProviders\CustomMysqlProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends MainProvider
{
    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        AuthServiceProvider::class,
        EventServiceProvider::class
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [

    ];

    public function boot()
    {
        parent::boot();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();
    }
}
