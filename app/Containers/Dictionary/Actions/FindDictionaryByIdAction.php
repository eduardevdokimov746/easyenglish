<?php

namespace App\Containers\Dictionary\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDictionaryByIdAction extends Action
{
    public function run(Request $request)
    {
        $dictionary = Apiato::call('Dictionary@FindDictionaryByIdTask', [$request->id]);

        return $dictionary;
    }
}
