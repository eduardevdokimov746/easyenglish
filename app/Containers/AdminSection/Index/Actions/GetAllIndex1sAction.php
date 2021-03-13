<?php

namespace App\Containers\Index1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllIndex1sAction extends Action
{
    public function run(Request $request)
    {
        $index1s = Apiato::call('Index1@GetAllIndex1sTask', [], ['addRequestCriteria']);

        return $index1s;
    }
}
