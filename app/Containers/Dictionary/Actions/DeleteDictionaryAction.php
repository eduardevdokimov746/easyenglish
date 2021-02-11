<?php

namespace App\Containers\Dictionary\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDictionaryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Dictionary@DeleteDictionaryTask', [$request->id]);
    }
}
