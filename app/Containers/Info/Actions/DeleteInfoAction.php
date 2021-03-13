<?php

namespace App\Containers\Info\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteInfoAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Info@DeleteInfoTask', [$request->id]);
    }
}
