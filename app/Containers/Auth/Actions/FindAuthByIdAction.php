<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAuthByIdAction extends Action
{
    public function run(Request $request)
    {
        $auth = Apiato::call('Auth@FindAuthByIdTask', [$request->id]);

        return $auth;
    }
}
