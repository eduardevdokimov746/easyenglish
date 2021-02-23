<?php

namespace App\Containers\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSectionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $section = Apiato::call('Section@UpdateSectionTask', [$request->id, $data]);

        return $section;
    }
}
