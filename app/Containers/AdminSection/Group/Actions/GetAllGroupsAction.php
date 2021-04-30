<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;

class GetAllGroupsAction extends Action
{
    public function run()
    {
        $groups = Group::withCount('students')->paginate(10);

        return $groups;
    }
}
