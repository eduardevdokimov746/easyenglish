<?php

namespace App\Containers\TeacherSection\Course\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class StoreCourseRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return \ShipLocalization::getShipValidation();
    }

    public function attributes()
    {
        return \ShipLocalization::includeFile('attributes');
    }
}
