<?php

namespace App\Containers\Teacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTeacherAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $teacher = Apiato::call('Teacher@CreateTeacherTask', [$data]);

        return $teacher;
    }
}
