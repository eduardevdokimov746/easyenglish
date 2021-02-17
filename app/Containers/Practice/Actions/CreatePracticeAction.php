<?php

namespace App\Containers\Practice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePracticeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $practice = Apiato::call('Practice@CreatePracticeTask', [$data]);

        return $practice;
    }
}
