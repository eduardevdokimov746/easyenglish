<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindUserByIdAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('User@FindUserByIdTask', [$request->id]);

        return $user;
    }
}
