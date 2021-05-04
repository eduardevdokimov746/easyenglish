<?php

namespace App\Containers\TeacherSection\Zadanie\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class EditZadanieRequest extends Request
{
    protected $urlParameters = [
        'id',
    ];

    public function rules()
    {
        return [
            'id' => 'exists:zadanies,id',
        ];
    }
}
