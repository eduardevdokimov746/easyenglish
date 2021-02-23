<?php

namespace App\Containers\Zadanie\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindZadanieByIdAction extends Action
{
    public function run(Request $request)
    {
        $zadanie = Apiato::call('Zadanie@FindZadanieByIdTask', [$request->id]);

        return $zadanie;
    }
}
