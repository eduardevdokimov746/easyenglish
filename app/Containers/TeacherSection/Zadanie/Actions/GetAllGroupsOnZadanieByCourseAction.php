<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;

class GetAllGroupsOnZadanieByCourseAction extends Action
{
    public function run($zadanie_id)
    {
        $data = Zadanie::where('id', $zadanie_id)->with('section.course.groups')->first();

        return $data->section?->course?->groups;
    }
}
