<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Auth\UI\WEB\Requests\PasswordUpdateRequest;
use App\Containers\Auth\UI\WEB\Requests\PasswordCheckCodeRestoreRequest;

class ResetPasswordController extends WebController
{
    public function showResetForm(PasswordCheckCodeRestoreRequest $request)
    {
        return view('auth::password/reset')->with(['code' => $request->get('code')]);
    }

    public function reset(PasswordUpdateRequest $request)
    {
        $isRestoredPassword = \Apiato::call('Auth@UpdatePasswordAction', [$request]);
        $isDeletedRestoreCode = \Apiato::call('Auth@DeleteRestorePasswordCodeAction', [$request]);

        if ($isDeletedRestoreCode && $isRestoredPassword) {
            session()->flash('notice-auth', __('auth::actions.updated-password'));
            return redirect()->route('web_login');
        }

        return back()->withErrors([__('ship::validation.error-server')]);
    }
}
