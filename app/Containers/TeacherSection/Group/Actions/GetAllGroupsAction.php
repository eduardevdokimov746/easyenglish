<?php

namespace App\Containers\TeacherSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;

class GetAllGroupsAction extends Action
{
    public function run()
    {
        $groups = Group::get();

        return $groups;
    }
}
