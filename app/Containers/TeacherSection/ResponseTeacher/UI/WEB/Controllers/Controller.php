<?php

namespace App\Containers\TeacherSection\ResponseTeacher\UI\WEB\Controllers;

use App\Containers\ResponseTeacher\UI\WEB\Requests\CreateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\DeleteResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\GetAllResponseTeachersRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\FindResponseTeacherByIdRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\UpdateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\StoreResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\EditResponseTeacherRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function store($id)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }
        try {
            $requestData = request()->only(['comment', 'is_credited', 'result']);

            if (!request()->filled('result')) {
                $requestData['result'] = null;
            }

            $data = array_merge(['user_id' => \Auth::id()], $requestData);

            \Apiato::call('TeacherSection\ResponseTeacher@CreateResponseTeacherAction', [$id, $data]);

            return json_encode(['type' => 'success', 'msg' => __('teachersection/responseteacher::action.created')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }
    }

    public function update($student_response, $teacher_response)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            $requestData = request()->only(['comment', 'is_credited', 'result']);

            if (!request()->filled('result')) {
                $requestData['result'] = null;
            }

            \Apiato::call('TeacherSection\ResponseTeacher@UpdateResponseTeacherAction', [$teacher_response, $requestData]);

            return json_encode(['type' => 'success', 'msg' => __('teachersection/responseteacher::action.updated')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }
    }
}
