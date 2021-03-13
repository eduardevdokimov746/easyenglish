<?php

namespace App\Containers\Index\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateIndexAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $index = Apiato::call('Index@UpdateIndexTask', [$request->id, $data]);

        return $index;
    }
}
