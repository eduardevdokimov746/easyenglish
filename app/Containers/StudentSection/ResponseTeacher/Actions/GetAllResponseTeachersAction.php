<?php

namespace App\Containers\ResponseTeacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllResponseTeachersAction extends Action
{
    public function run(Request $request)
    {
        $responseteachers = Apiato::call('ResponseTeacher@GetAllResponseTeachersTask', [], ['addRequestCriteria']);

        return $responseteachers;
    }
}
