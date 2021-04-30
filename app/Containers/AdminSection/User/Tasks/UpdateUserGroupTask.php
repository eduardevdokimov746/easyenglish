<?php

namespace App\Containers\AdminSection\User\Tasks;

use App\Containers\AdminSection\Group\Models\StudentGroup;
use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class UpdateUserGroupTask extends Task
{
    public function run($user_id, $group_id)
    {
        StudentGroup::updateOrInsert(['user_id' => $user_id], ['group_id' => $group_id]);
    }
}
