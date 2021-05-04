<?php

namespace App\Containers\TeacherSection\Group\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Ship\Parents\Actions\Action;

class GetAllCoursesWithGroupsAction extends Action
{
    public function run(int $user_id)
    {
        return Course::where('user_id', $user_id)->with(['groups'])->get();
    }
}
