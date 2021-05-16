<?php

namespace App\Containers\TeacherSection\ResponseTeacher\Actions;

use App\Containers\TeacherSection\ResponseTeacher\Models\ResponseTeacher;
use App\Ship\Parents\Actions\Action;

class UpdateResponseTeacherAction extends Action
{
    public function run($response_id, $data)
    {
        ResponseTeacher::where('id', $response_id)->update($data);
    }
}
