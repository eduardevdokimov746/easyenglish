<?php

namespace App\Containers\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSectionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Section@DeleteSectionTask', [$request->id]);
    }
}
