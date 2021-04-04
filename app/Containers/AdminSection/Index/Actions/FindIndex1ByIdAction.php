<?php

namespace App\Containers\Index1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindIndex1ByIdAction extends Action
{
    public function run(Request $request)
    {
        $index1 = Apiato::call('Index1@FindIndex1ByIdTask', [$request->id]);

        return $index1;
    }
}
