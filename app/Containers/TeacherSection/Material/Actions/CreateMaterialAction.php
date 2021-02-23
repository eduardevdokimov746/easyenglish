<?php

namespace App\Containers\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMaterialAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $material = Apiato::call('Material@CreateMaterialTask', [$data]);

        return $material;
    }
}
