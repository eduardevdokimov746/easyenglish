<?php

namespace App\Containers\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCourseByIdAction extends Action
{
    public function run(Request $request)
    {
        $course = Apiato::call('Course@FindCourseByIdTask', [$request->id]);

        return $course;
    }
}
