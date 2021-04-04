<?php

namespace App\Containers\Auth\Actions;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Validator;

class CheckExistEmailAction extends Action
{
    public function run(string $email): bool
    {
        $emailModel = Email::where('email', $email)->where('is_confirmation', 1)->first();

        return !is_null($emailModel);
    }
}
