<?php

namespace App\Containers\Group\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateGroupAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $group = Apiato::call('Group@UpdateGroupTask', [$request->id, $data]);

        return $group;
    }
}
