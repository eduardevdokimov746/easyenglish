<?php

namespace App\Containers\Auth\Providers;

use App\Ship\Parents\Providers\AuthProvider;
use App\Containers\Auth\Guards\CustomGuard;
use App\Containers\Auth\AuthProviders\CustomMysqlProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class AuthServiceProvider extends AuthProvider
{

    public function boot()
    {
        parent::boot();

        \Auth::extend('custom', function ($app, $name, array $config) {
            return new CustomGuard(\Auth::createUserProvider($config['provider']));
        });

        \Auth::provider('custom_provider', function ($app, array $config) {
            return new CustomMysqlProvider;
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
