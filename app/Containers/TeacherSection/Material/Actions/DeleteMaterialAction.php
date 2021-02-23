<?php

namespace App\Containers\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMaterialAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Material@DeleteMaterialTask', [$request->id]);
    }
}
