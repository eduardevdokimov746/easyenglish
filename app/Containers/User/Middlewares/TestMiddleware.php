<?php

namespace App\Containers\User\Middlewares;

use App\Ship\Parents\Middlewares\Middleware;
use Illuminate\Http\Request;

class TestMiddleware extends Middleware
{
    public function handle(Request $request, \Closure $closure)
    {
        if ($request->name != 'edik') {
            throw new \Exception('TEST MIDDLEWARE NOT RUN');
        }

        return $closure($request);
    }
}
