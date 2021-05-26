<?php

namespace App\Containers\Material\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class StoreMaterialRequest extends Request
{
    public function rules()
    {
        return [
            'plain_title' => 'required|string',
            'html_title' => 'required|string',
            'plain_text' => 'required|string',
            'html_text' => 'required|string'
        ];
    }
}
