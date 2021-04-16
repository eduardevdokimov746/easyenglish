<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class UpdatePasswordTask extends Task
{
    public function run(int $user_id, string $password)
    {
        $passwordHash = \Hash::make($password);
        return User::where('id', $user_id)->update(['password' => $passwordHash]);
    }
}
