<?php

namespace App\Containers\Auth\Providers;

use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;
use App\Containers\Auth\Guards\CustomGuard;
use App\Containers\Auth\AuthProviders\CustomMysqlProvider;

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

        \Gate::define('my-account', function(User $auth, User $user){
            return $auth->id === $user->id;
        });

        \Gate::define('teacher', function(User $auth){
            return $auth->role === 'teacher';
        });

        \Gate::define('student', function(User $auth){
            return $auth->role === 'student';
        });
    }

    public function register()
    {
        parent::register();
    }
}
