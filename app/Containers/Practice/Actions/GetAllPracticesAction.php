<?php

namespace App\Containers\Practice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPracticesAction extends Action
{
    public function run(Request $request)
    {
        $practices = Apiato::call('Practice@GetAllPracticesTask', [], ['addRequestCriteria']);

        return $practices;
    }
}
