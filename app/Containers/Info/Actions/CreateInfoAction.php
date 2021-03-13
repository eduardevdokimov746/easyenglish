<?php

namespace App\Containers\Info\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateInfoAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $info = Apiato::call('Info@CreateInfoTask', [$data]);

        return $info;
    }
}
