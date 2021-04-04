<?php

namespace App\Containers\User1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindUser1ByIdAction extends Action
{
    public function run(Request $request)
    {
        $user1 = Apiato::call('User1@FindUser1ByIdTask', [$request->id]);

        return $user1;
    }
}
