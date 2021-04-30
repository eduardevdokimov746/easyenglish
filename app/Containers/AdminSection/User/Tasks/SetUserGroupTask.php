<?php

namespace App\Containers\AdminSection\User\Tasks;

use App\Containers\AdminSection\Group\Models\StudentGroup;
use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class SetUserGroupTask extends Task
{
    public function run(User $user, $group_id)
    {
        StudentGroup::create(['user_id' => $user->id, 'group_id' => $group_id]);
    }
}
