<?php

namespace App\Containers\Zadanie\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllZadaniesAction extends Action
{
    public function run(Request $request)
    {
        $zadanies = Apiato::call('Zadanie@GetAllZadaniesTask', [], ['addRequestCriteria']);

        return $zadanies;
    }
}
