<?php

namespace App\Containers\Index\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllIndicesAction extends Action
{
    public function run(Request $request)
    {
        $indices = Apiato::call('Index@GetAllIndicesTask', [], ['addRequestCriteria']);

        return $indices;
    }
}
