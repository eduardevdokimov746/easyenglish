<?php

namespace App\Containers\StudentSection\ResponseStudent\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class UpdateResponseStudentRequest extends Request
{
    protected $urlParameters = [
        'id',
    ];

    public function rules()
    {
        return [
            'id' => 'exists:responses_students,id',
        ];
    }
}
