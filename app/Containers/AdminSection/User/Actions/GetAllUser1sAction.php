<?php

namespace App\Containers\User1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllUser1sAction extends Action
{
    public function run(Request $request)
    {
        $user1s = Apiato::call('User1@GetAllUser1sTask', [], ['addRequestCriteria']);

        return $user1s;
    }
}
