<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCourseAction extends Action
{
    public function run($course_id, $data)
    {
        Course::where('id', $course_id)->update($data);
    }
}
