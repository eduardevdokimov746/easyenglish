<?php

namespace App\Containers\TeacherSection\Zadanie\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class UpdateZadanieRequest extends Request
{
    public function rules()
    {
        return [
            'section_id' => 'required',
            'title' => 'required',
            'deadline' => 'required',
        ];
    }
}
