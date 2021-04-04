<?php

namespace App\Containers\Index1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateIndex1Action extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $index1 = Apiato::call('Index1@CreateIndex1Task', [$data]);

        return $index1;
    }
}
