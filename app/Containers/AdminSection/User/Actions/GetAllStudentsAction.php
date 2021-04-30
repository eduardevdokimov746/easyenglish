<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class GetAllStudentsAction extends Action
{
    public function run($limit = 20)
    {
        return User::where('role', 'student')->limit(20)->get();
    }
}
