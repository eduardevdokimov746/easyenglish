<?php

namespace App\Containers\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMaterialByIdAction extends Action
{
    public function run(Request $request)
    {
        $material = Apiato::call('Material@FindMaterialByIdTask', [$request->id]);

        return $material;
    }
}
