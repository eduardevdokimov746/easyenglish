<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAuthsAction extends Action
{
    public function run(Request $request)
    {
        $auths = Apiato::call('Auth@GetAllAuthsTask', [], ['addRequestCriteria']);

        return $auths;
    }
}
