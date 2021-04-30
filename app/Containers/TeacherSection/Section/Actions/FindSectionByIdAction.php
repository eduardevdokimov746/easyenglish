<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\Section;
use App\Ship\Parents\Actions\Action;

class FindSectionByIdAction extends Action
{
    public function run(int $section_id)
    {
        $section = Section::where('id', $section_id)->with(['course', 'links', 'files'])->first();

        return $section;
    }
}
