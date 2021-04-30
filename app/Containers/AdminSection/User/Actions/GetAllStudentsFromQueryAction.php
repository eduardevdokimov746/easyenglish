<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class GetAllStudentsFromQueryAction extends Action
{
    public function run($query)
    {
        return User::select(['id', 'first_name', 'last_name', 'otchestvo', 'login', 'role'])
            ->where('role', 'student')
            ->where('login', 'like', "%$query%")
            ->orWhereRaw("CONCAT(last_name, ' ', first_name, ' ', otchestvo) like '%$query%'")
            ->get();
    }
}
