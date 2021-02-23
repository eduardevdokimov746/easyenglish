<?php

namespace App\Containers\ResponseStudent\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindResponseStudentByIdAction extends Action
{
    public function run(Request $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@FindResponseStudentByIdTask', [$request->id]);

        return $responsestudent;
    }
}
