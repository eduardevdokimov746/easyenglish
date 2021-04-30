<?php

namespace App\Containers\AdminSection\User\UI\WEB\Requests;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Requests\Request;

class StoreUserRequest extends Request
{
    public function rules()
    {
        $rules = [
            'users.login' => 'required|min:3|unique:users,login',
            'email' => [
                'bail',
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if ($value != 'localhost@mail.com') {
                        if(!is_null(Email::where('email', $value)->first())){
                            $fail(__('ship::validation.register-email-already-exist'));
                        }
                    }
                }
            ],
            'users.password' => ['required'],
            'users.role' => [
                'required',
                function($attribute, $value, $fail){
                    if($value == 'default'){
                        $fail(__('adminsection/user::validation.select-required', ['attribute' => __('adminsection/user::attributes.users-role')]));
                    }
                },
            ],
            'users.avatar' => 'mimes:jpeg,jpg,png|image'
        ];

        if ($this->request->get('users')['role'] == 'student') {
            $rules = array_merge($rules, ['group' => [
                'bail',
                function($attribute, $value, $fail){
                    if($value == 'default'){
                        $fail(__('adminsection/user::validation.select-required', ['attribute' => __('adminsection/user::attributes.group')]));
                    }
                },
                'exists:groups,slug'
            ]]);
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
