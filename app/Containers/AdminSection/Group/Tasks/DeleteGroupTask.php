<?php

namespace App\Containers\AdminSection\Group\Tasks;

use App\Containers\AdminSection\Group\Models\StudentGroup;
use App\Ship\Parents\Tasks\Task;

class DeleteGroupTask extends Task
{
    public function run($user_id)
    {
        StudentGroup::where('user_id', $user_id)->delete();
    }
}
