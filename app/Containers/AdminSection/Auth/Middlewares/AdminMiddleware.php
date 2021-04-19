<?php

namespace App\Containers\AdminSection\Auth\Middlewares;

use App\Ship\Parents\Middlewares\Middleware;

class AdminMiddleware extends Middleware
{
    public function handle($request, \Closure $next)
    {
        if (\Auth::check() && \Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect()->route('web_admin_show_login_form');
    }
}