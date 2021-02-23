<?php

namespace App\Containers\ResponseStudent\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteResponseStudentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ResponseStudent@DeleteResponseStudentTask', [$request->id]);
    }
}
