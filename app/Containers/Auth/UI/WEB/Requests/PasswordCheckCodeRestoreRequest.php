<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use App\Containers\Auth\Models\PasswordReset;
use Illuminate\Support\Carbon;

class PasswordCheckCodeRestoreRequest extends Request
{
    public function rules()
    {
        return [
            'code' => [
                'bail',
                'exists:password_resets,token',
                function ($attribute, $value, $fail) {
                    $passwordRestoreModel = PasswordReset::where('token', $value)->first();
                    $dateCreatedToken = $passwordRestoreModel->created_at;
                    $currentDate = Carbon::now();
                    $hoursPass = $currentDate->diffInHours($dateCreatedToken);

                    if ($hoursPass > 0) {
                        $fail(__('auth::validation.forgot-password-code-expired'));
                    }
                }
            ],
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

    public function authorize()
    {
        return true;
    }
}
