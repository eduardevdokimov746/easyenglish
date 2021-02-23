<?php

namespace App\Containers\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCoursesAction extends Action
{
    public function run(Request $request)
    {
        $courses = Apiato::call('Course@GetAllCoursesTask', [], ['addRequestCriteria']);

        return $courses;
    }
}
