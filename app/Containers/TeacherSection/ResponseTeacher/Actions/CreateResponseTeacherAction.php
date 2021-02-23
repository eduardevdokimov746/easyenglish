<?php

namespace App\Containers\ResponseTeacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateResponseTeacherAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $responseteacher = Apiato::call('ResponseTeacher@CreateResponseTeacherTask', [$data]);

        return $responseteacher;
    }
}
