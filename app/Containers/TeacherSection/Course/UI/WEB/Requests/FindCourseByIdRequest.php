<?php

namespace App\Containers\TeacherSection\Course\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class FindCourseByIdRequest extends Request
{
    public function rules()
    {
        return [
            // 'id' => 'required',
            // '{user-input}' => 'required|max:255',
        ];
    }
}