<?php

namespace App\Containers\AdminSection\Group\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use App\Containers\TeacherSection\Group\Models\Group;

class UpdateGroupRequest extends Request
{
    protected $urlParameters = [
        'id',
    ];

    public function rules()
    {
        $rules = [
            'title' => [
                'required'
            ]
        ];

        if (Group::where('id', request()->id)->first()->title !== $this->request->get('title')) {
            $rules['title'][] = 'unique:groups,title';
        }

        return $rules;
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
