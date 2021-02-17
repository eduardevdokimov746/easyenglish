<?php

namespace App\Containers\Practice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPracticeByIdAction extends Action
{
    public function run(Request $request)
    {
        $practice = Apiato::call('Practice@FindPracticeByIdTask', [$request->id]);

        return $practice;
    }
}
