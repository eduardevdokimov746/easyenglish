<?php

namespace App\Containers\Auth1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAuth1Action extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Auth1@DeleteAuth1Task', [$request->id]);
    }
}
