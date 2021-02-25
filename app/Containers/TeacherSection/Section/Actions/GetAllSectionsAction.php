<?php

namespace App\Containers\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSectionsAction extends Action
{
    public function run(Request $request)
    {
        $sections = Apiato::call('Section@GetAllSectionsTask', [], ['addRequestCriteria']);

        return $sections;
    }
}
