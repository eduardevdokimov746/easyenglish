<?php

namespace App\Containers\Zadanie\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteZadanieAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Zadanie@DeleteZadanieTask', [$request->id]);
    }
}
