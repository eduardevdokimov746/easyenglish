<?php

namespace App\Containers\TeacherSection\Section\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class StoreSectionRequest extends Request
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
