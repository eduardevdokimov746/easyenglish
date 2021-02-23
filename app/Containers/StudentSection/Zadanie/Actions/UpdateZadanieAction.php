<?php

namespace App\Containers\Zadanie\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateZadanieAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $zadanie = Apiato::call('Zadanie@UpdateZadanieTask', [$request->id, $data]);

        return $zadanie;
    }
}
