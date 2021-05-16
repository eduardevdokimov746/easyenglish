<?php

namespace App\Containers\StudentSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;

class DeleteResponseStudentAction extends Action
{
    public function run($id)
    {
        return ResponseStudent::where('id', $id)->delete()
    }
}
