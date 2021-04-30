<?php

namespace App\Containers\AdminSection\Auth\Providers;

use App\Containers\AdminSection\Auth\Middlewares\AdminMiddleware;
use App\Ship\Parents\Providers\MiddlewareProvider;

class MiddlewareServiceProvider extends MiddlewareProvider
{
    protected $routeMiddleware = [
        'admin' => AdminMiddleware::class
    ];
}