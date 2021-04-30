<?php

namespace App\Containers\AdminSection\Group\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class StoreGroupRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required|unique:groups,title'
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
