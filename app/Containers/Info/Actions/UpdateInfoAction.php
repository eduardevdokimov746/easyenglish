<?php

namespace App\Containers\Info\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateInfoAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $info = Apiato::call('Info@UpdateInfoTask', [$request->id, $data]);

        return $info;
    }
}
