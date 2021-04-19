<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Course\Models\Course;

class HideCourseAction extends Action
{
    public function run(int $course_id)
    {
        try{
            Course::where('id', $course_id)->update(['is_visible' => 0]);
            return true;
        }catch (\Exception){
            return false;
        }
    }
}
