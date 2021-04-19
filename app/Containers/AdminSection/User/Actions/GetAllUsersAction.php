<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class GetAllUsersAction extends Action
{
    public function run($role)
    {
        $users = User::select(['id', 'role', 'login', 'first_name', 'last_name', 'otchestvo'])
            ->where('role', $role)
            ->with('email')
            ->paginate(10);

        return $users;
    }
}
