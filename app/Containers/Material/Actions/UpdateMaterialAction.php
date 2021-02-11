<?php

namespace App\Containers\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMaterialAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $material = Apiato::call('Material@UpdateMaterialTask', [$request->id, $data]);

        return $material;
    }
}
