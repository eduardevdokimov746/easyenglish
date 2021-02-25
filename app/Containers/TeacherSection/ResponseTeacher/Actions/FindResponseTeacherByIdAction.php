<?php

namespace App\Containers\ResponseTeacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindResponseTeacherByIdAction extends Action
{
    public function run(Request $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@FindResponseTeacherByIdTask', [$request->id]);

        return $responseteacher;
    }
}
