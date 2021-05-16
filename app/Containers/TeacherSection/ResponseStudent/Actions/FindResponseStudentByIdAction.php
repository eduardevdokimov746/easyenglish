<?php

namespace App\Containers\TeacherSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindResponseStudentByIdAction extends Action
{
    public function run($id)
    {
        $response = ResponseStudent::where('id', $id)->with(['files', 'user', 'zadanie', 'responseTeacher'])->first();

        if (is_null($response->responseTeacher)) {
            $response->type = 'Не оценено';
        } else if (!is_null($response->responseTeacher) && $response->responseTeacher->is_credited == 0) {
            $response->type = 'Не зачтено';
        } else if (!is_null($response->responseTeacher) && $response->responseTeacher->is_credited == 1) {
            $response->type = 'Зачтено';
        }

        return $response;
    }
}
