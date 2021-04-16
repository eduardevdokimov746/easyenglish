<?php

namespace App\Containers\Auth\Actions;

use App\Containers\Auth\Models\PasswordReset;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteRestorePasswordCodeAction extends Action
{
    public function run(Request $request): bool
    {
        try{
            $code = $request->get('code');

            $status = PasswordReset::where('token', $code)->delete();

            if ($status > 0) {
                return true;
            }

            return false;
        }catch (\Exception) {
            return false;
        }
    }
}
