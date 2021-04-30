<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;

class DeleteGroupAction extends Action
{
    public function run($group_id)
    {
        return Group::where('id', $group_id)->delete();
    }
}
