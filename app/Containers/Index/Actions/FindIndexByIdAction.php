<?php

namespace App\Containers\Index\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindIndexByIdAction extends Action
{
    public function run(Request $request)
    {
        $index = Apiato::call('Index@FindIndexByIdTask', [$request->id]);

        return $index;
    }
}
