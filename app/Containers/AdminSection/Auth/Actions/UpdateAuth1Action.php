<?php

namespace App\Containers\Auth1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAuth1Action extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $auth1 = Apiato::call('Auth1@UpdateAuth1Task', [$request->id, $data]);

        return $auth1;
    }
}
