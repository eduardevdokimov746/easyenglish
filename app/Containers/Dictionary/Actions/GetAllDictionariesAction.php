<?php

namespace App\Containers\Dictionary\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDictionariesAction extends Action
{
    public function run(Request $request)
    {
        $dictionaries = Apiato::call('Dictionary@GetAllDictionariesTask', [], ['addRequestCriteria']);

        return $dictionaries;
    }
}
