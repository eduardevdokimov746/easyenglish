<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\Section;
use App\Ship\Parents\Actions\Action;

class ShowSectionAction extends Action
{
    public function run(int $course_id)
    {
        Section::where('id', $course_id)->update(['is_visible' => 1]);
    }
}
