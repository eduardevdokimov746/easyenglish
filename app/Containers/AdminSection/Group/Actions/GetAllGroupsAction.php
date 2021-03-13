<?php

namespace App\Containers\Group\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllGroupsAction extends Action
{
    public function run(Request $request)
    {
        $groups = Apiato::call('Group@GetAllGroupsTask', [], ['addRequestCriteria']);

        return $groups;
    }
}
