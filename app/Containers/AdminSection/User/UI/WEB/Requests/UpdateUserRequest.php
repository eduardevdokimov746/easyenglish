<?php

namespace App\Containers\AdminSection\User\UI\WEB\Requests;

use App\Containers\User\Models\User;
use App\Containers\User\Models\Email;
use App\Ship\Parents\Requests\Request;

class UpdateUserRequest extends Request
{
    public function rules()
    {
        $user = \Apiato::call('User@FindUserByIdAction', [$this->request->get('id')]);

        $rules = [
            'users.login' => [
                'required',
                function($attribute, $value, $fail) use ($user) {
                    if ($user->login != $value) {
                        if (!is_null(User::where('login', $value)->first())) {
                            $fail(__('auth::validation.register-login-already-exist'));
                        }
                    }
                },
                'min:3'
            ],
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail) use ($user) {
                    if (!is_null($user->email) && $user->email->email != $value) {
                        if (!is_null(Email::where('email', $value)->first())) {
                            $fail(__('auth::validation.register-email-already-exist'));
                        }
                    }
                },
            ],
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
