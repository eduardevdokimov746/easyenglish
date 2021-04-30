<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;

class FindGroupByIdAction extends Action
{
    public function run($id)
    {
        $group = Group::where('id', $id)->with('students.student')->first();

        return $group;
    }
}
