<?php

namespace App\Containers\StudentSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;

class UpdateResponseStudentAction extends Action
{
    public function run($response_id, $data)
    {
        ResponseStudent::where('id', $response_id)->update($data);
    }
}
