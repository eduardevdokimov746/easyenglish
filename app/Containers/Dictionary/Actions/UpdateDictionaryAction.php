<?php

namespace App\Containers\Dictionary\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateDictionaryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $dictionary = Apiato::call('Dictionary@UpdateDictionaryTask', [$request->id, $data]);

        return $dictionary;
    }
}
