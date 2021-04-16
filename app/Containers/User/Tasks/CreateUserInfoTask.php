<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;

class CreateUserInfoTask extends Task
{
    public function run(User $user, array $data)
    {
        $userInfo = $user->userInfo()->create($data);
        $user->setRelation('userInfo', $userInfo);
        return $user;
    }
}
