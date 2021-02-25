<?php

namespace App\Containers\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCourseAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Course@DeleteCourseTask', [$request->id]);
    }
}
