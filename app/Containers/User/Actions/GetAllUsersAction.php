<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllUsersAction extends Action
{
    public function run(Request $request)
    {
        $users = Apiato::call('User@GetAllUsersTask', [], ['addRequestCriteria']);

        return $users;
    }
}
