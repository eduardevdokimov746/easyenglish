<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAuthAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $auth = Apiato::call('Auth@CreateAuthTask', [$data]);

        return $auth;
    }
}
