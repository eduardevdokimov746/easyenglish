<?php

namespace App\Containers\Teacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTeacherByIdAction extends Action
{
    public function run(Request $request)
    {
        $teacher = Apiato::call('Teacher@FindTeacherByIdTask', [$request->id]);

        return $teacher;
    }
}
