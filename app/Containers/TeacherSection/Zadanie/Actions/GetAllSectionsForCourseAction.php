<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Section\Models\Section;
use App\Ship\Parents\Actions\Action;

class GetAllSectionsForCourseAction extends Action
{
    public function run($course_id)
    {
        return Section::where('course_id', $course_id)->get();
    }
}
