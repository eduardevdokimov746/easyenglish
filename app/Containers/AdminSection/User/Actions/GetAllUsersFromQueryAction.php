<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class GetAllUsersFromQueryAction extends Action
{
    public function run($query)
    {
        $users = User::select('users.*')->where('login', 'like', "%$query%")
            ->join('email_users', 'email_users.user_id', '=', 'users.id')
            ->orWhereRaw("CONCAT(last_name, ' ', first_name, ' ', otchestvo) like '%$query%'")
            ->orWhere('email', 'like', "%$query%")
            ->with('email')
            ->get();
        return $users;
    }
}
