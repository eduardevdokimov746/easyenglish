<?php

namespace App\Containers\ResponseTeacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteResponseTeacherAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ResponseTeacher@DeleteResponseTeacherTask', [$request->id]);
    }
}
