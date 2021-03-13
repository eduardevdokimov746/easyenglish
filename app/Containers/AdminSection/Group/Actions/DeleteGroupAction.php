<?php

namespace App\Containers\Group\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteGroupAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Group@DeleteGroupTask', [$request->id]);
    }
}
