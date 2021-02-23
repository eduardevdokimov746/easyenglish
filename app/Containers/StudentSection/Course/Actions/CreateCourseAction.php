<?php

namespace App\Containers\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCourseAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $course = Apiato::call('Course@CreateCourseTask', [$data]);

        return $course;
    }
}
