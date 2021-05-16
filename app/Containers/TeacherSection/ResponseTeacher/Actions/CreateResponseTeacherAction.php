<?php

namespace App\Containers\TeacherSection\ResponseTeacher\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;

class CreateResponseTeacherAction extends Action
{
    public function run($response_id, $data)
    {
        return ResponseStudent::where('id', $response_id)->first()->responseTeacher()->create($data);
    }
}
