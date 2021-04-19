<?php

namespace App\Containers\AdminSection\Auth\Providers;

use App\Containers\AdminSection\Auth\AuthProviders\AdminMysqlProvider;
use App\Containers\AdminSection\Auth\Guards\AdminGuard;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Auth::extend('admin-auth', function ($app, $name, array $config) {
            return new AdminGuard(\Auth::createUserProvider($config['provider']));
        });

        \Auth::provider('admin-provider', function ($app, array $config) {
            return new AdminMysqlProvider();
        });
    }
}