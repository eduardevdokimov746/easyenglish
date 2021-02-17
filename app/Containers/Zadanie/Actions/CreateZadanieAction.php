<?php

namespace App\Containers\Zadanie\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateZadanieAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $zadanie = Apiato::call('Zadanie@CreateZadanieTask', [$data]);

        return $zadanie;
    }
}
