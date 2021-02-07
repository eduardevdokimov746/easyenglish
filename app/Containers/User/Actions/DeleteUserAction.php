<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteUserAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('User@DeleteUserTask', [$request->id]);
    }
}
