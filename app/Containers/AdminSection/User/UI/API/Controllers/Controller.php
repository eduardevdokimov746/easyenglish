<?php

namespace App\Containers\AdminSection\User\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function search()
    {
        $users = \Apiato::call('AdminSection\User@GetAllUsersFromQueryAction', [request()->get('query')]);

        return $this->json($users);
    }
}
