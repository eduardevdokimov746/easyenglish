<?php

namespace App\Containers\Auth\Actions;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Actions\Action;
use App\Containers\Auth\UI\WEB\Requests\ConfirmEmailRequest;

class ConfirmEmailAction extends Action
{
    public function run(ConfirmEmailRequest $request): bool
    {
        try{
            $code = $request->code;

            $updates = [
                'is_confirmation' => 1,
                'confirmation_code' => null
            ];

            $email = Email::where('confirmation_code', $code)->first();

            $email->update($updates);
            return true;
        }catch (\Exception) {
            return false;
        }
    }
}
