<?php

namespace App\Containers\AdminSection\Group\Tasks;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Tasks\Task;

class UpdateGroupTitleTask extends Task
{
    public function run($group_id, $title)
    {
        $slug = \Str::slug($title);

        Group::where('id', $group_id)->update(['title' => $title, 'slug' => $slug]);
    }
}
