<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Section\Models\Section;

class CreateLinkAction extends Action
{
    public function run($section_id, $data)
    {
        try{
            $data['url'] = $data['type'] . $data['url'];

            $link = Section::where('id', $section_id)->first()->links()->create($data);

            return $link;
        }catch (\Exception $e){
            return false;
        }
    }
}
