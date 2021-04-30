<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Section\Models\Section;

class HideSectionAction extends Action
{
    public function run(int $course_id)
    {
        Section::where('id', $course_id)->update(['is_visible' => 0]);
    }
}
