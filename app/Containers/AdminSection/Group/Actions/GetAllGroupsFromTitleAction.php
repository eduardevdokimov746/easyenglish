<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;

class GetAllGroupsFromTitleAction extends Action
{
    public function run($title)
    {
        return Group::where('title', 'like', "%$title%")->withCount('students')->get();
    }
}
