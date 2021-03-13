<?php

namespace App\Containers\Index1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteIndex1Action extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Index1@DeleteIndex1Task', [$request->id]);
    }
}
