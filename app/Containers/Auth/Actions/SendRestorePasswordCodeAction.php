<?php

namespace App\Containers\Auth\Actions;

use App\Containers\Auth\Mails\RestorePasswordMail;
use App\Containers\Auth\Models\PasswordReset;
use App\Containers\Auth\UI\WEB\Requests\ForgotPasswordCodeRequest;
use App\Containers\User\Models\Email;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Carbon;

class SendRestorePasswordCodeAction extends Action
{
    public function run(ForgotPasswordCodeRequest $request): bool
    {
        try{
            $email = $request->get('email');
            $token = md5(rand(999, 99999));

            $emailModel = Email::where('email', $email)->first();
            PasswordReset::updateOrCreate(['email_id' => $emailModel->id], ['token' => $token, 'created_at' => Carbon::now()]);

            \Mail::to($email)->send(new RestorePasswordMail($email, $token));

            return true;
        }catch (\Exception) {
            return false;
        }
    }
}
