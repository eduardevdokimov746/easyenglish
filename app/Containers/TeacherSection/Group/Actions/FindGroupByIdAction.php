<?php

namespace App\Containers\Group\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindGroupByIdAction extends Action
{
    public function run(Request $request)
    {
        $group = Apiato::call('Group@FindGroupByIdTask', [$request->id]);

        return $group;
    }
}
