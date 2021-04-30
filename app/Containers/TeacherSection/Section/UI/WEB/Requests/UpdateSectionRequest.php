<?php

namespace App\Containers\TeacherSection\Section\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class UpdateSectionRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required'
        ];
    }
}
