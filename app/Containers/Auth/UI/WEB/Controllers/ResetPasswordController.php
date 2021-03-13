<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class ResetPasswordController extends WebController
{
    public function showResetForm()
    {
        //проверка токена восстановления пароля и отрисовка формы добавления нового пароля
        return view('auth::password/reset');
    }

    public function reset()
    {
        //изменение старого пароля на новый и редирект на форму входа
    }
}
