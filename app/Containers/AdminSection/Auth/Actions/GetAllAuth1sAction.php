<?php

namespace App\Containers\Auth1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAuth1sAction extends Action
{
    public function run(Request $request)
    {
        $auth1s = Apiato::call('Auth1@GetAllAuth1sTask', [], ['addRequestCriteria']);

        return $auth1s;
    }
}
