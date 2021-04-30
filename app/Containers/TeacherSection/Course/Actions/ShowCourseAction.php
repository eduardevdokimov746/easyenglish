<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Course\Models\Course;

class ShowCourseAction extends Action
{
    public function run(int $course_id)
    {
        Course::where('id', $course_id)->update(['is_visible' => 1]);
    }
}
