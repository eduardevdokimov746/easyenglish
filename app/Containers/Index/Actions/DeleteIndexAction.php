<?php

namespace App\Containers\Index\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteIndexAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Index@DeleteIndexTask', [$request->id]);
    }
}
