<?php

namespace App\Containers\AdminSection\Group\Tasks;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Tasks\Task;

class GetGroupBySlugTask extends Task
{
    public function run($slug)
    {
        return Group::where('slug', $slug)->first();
    }
}
