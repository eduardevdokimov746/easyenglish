<?php

namespace App\Containers\Teacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTeacherAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Teacher@DeleteTeacherTask', [$request->id]);
    }
}
