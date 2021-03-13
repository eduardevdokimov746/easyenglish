<?php

namespace App\Containers\User1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteUser1Action extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('User1@DeleteUser1Task', [$request->id]);
    }
}
