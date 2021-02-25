<?php

namespace App\Containers\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSectionByIdAction extends Action
{
    public function run(Request $request)
    {
        $section = Apiato::call('Section@FindSectionByIdTask', [$request->id]);

        return $section;
    }
}
