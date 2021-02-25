<?php

namespace App\Containers\ResponseStudent\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateResponseStudentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $responsestudent = Apiato::call('ResponseStudent@CreateResponseStudentTask', [$data]);

        return $responsestudent;
    }
}
