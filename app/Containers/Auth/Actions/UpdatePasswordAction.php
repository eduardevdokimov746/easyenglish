<?php

namespace App\Containers\Auth\Actions;

use App\Containers\Auth\Models\PasswordReset;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdatePasswordAction extends Action
{
    public function run(Request $request): bool
    {
        try{
            $code = $request->get('code');
            $password = $request->get('password');
            $passwordHash = \Hash::make($password);

            $passwordResetModel = PasswordReset::where('token', $code)->with('email.user')->first();
            $status = $passwordResetModel->email->user()->update(['password' => $passwordHash]);

            if ($status > 0) {
                return true;
            }
            return false;
        }catch (\Exception) {
            return false;
        }
    }
}
