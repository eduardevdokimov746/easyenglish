<?php

namespace App\Ship\Middlewares\Http;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;

class Authenticate extends LaravelAuthenticate
{
    public function authenticate($request, array $guards)
    {
        try {
            return parent::authenticate($request, $guards);
        }
        catch (Exception $exception) {
            throw new AuthenticationException('Unauthenticated.', $guards, $this->redirectTo($request));
        }
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('web_show_login_form');
        }
    }
}
