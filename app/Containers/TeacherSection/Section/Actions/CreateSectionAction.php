<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Course\Models\Course;

class CreateSectionAction extends Action
{
    public function run($course_id, $data)
    {
        try{
            $section = Course::where('id', $course_id)->first()->sections()->create($data);

            return $section;
        }catch (\Exception $e){
            return false;
        }
    }
}
