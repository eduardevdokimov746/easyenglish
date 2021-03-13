<?php

namespace App\Containers\Info\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindInfoByIdAction extends Action
{
    public function run(Request $request)
    {
        $info = Apiato::call('Info@FindInfoByIdTask', [$request->id]);

        return $info;
    }
}
