<?php

namespace App\Containers\Practice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePracticeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Practice@DeletePracticeTask', [$request->id]);
    }
}
