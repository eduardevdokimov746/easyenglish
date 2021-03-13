<?php

namespace App\Containers\Info\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllInfosAction extends Action
{
    public function run(Request $request)
    {
        $infos = Apiato::call('Info@GetAllInfosTask', [], ['addRequestCriteria']);

        return $infos;
    }
}
