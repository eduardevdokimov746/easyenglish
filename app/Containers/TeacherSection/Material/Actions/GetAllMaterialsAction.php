<?php

namespace App\Containers\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMaterialsAction extends Action
{
    public function run(Request $request)
    {
        $materials = Apiato::call('Material@GetAllMaterialsTask', [], ['addRequestCriteria']);

        return $materials;
    }
}
