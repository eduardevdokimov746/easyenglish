<?php

namespace App\Containers\Teacher\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTeachersAction extends Action
{
    public function run(Request $request)
    {
        $teachers = Apiato::call('Teacher@GetAllTeachersTask', [], ['addRequestCriteria']);

        return $teachers;
    }
}
