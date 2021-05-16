<?php

namespace App\Containers\TeacherSection\Material\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class PrepareTextRequest extends Request
{
    public function rules()
    {
        return [
            'plain_title' => 'required',
            'plain_text' => 'required'
        ];
    }
}
