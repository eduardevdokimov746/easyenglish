<?php

namespace App\Containers\Practice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePracticeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $practice = Apiato::call('Practice@UpdatePracticeTask', [$request->id, $data]);

        return $practice;
    }
}
