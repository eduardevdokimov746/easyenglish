<?php

namespace App\Containers\Auth1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAuth1ByIdAction extends Action
{
    public function run(Request $request)
    {
        $auth1 = Apiato::call('Auth1@FindAuth1ByIdTask', [$request->id]);

        return $auth1;
    }
}
