<?php

namespace App\Containers\Index1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateIndex1Action extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $index1 = Apiato::call('Index1@UpdateIndex1Task', [$request->id, $data]);

        return $index1;
    }
}
