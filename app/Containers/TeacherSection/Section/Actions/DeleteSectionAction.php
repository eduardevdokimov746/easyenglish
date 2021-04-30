<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Section\Models\Section;

class DeleteSectionAction extends Action
{
    public function run(int $section_id)
    {
        Section::where('id', $section_id)->delete();
    }
}
