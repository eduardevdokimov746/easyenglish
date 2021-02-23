<?php

namespace App\Containers\ResponseStudent\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllResponseStudentsAction extends Action
{
    public function run(Request $request)
    {
        $responsestudents = Apiato::call('ResponseStudent@GetAllResponseStudentsTask', [], ['addRequestCriteria']);

        return $responsestudents;
    }
}
