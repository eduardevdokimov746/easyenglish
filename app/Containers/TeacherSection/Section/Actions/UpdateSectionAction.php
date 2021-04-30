<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\Section;
use App\Ship\Parents\Actions\Action;

class UpdateSectionAction extends Action
{
    public function run(int $section_id, $data)
    {
        Section::where('id', $section_id)->update($data);
    }
}
