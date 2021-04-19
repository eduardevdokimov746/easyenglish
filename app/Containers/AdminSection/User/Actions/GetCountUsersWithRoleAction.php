<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class GetCountUsersWithRoleAction extends Action
{
    public function run($role)
    {
        return User::where('role', $role)->count();
    }
}
