<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAuthAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Auth@DeleteAuthTask', [$request->id]);
    }
}
