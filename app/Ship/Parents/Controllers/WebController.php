<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\WebController as AbstractWebController;
use App\Containers\User\Models\User;

abstract class WebController extends AbstractWebController
{
    protected function isNotMyAccount(User $user): bool
    {
        return \Gate::denies('my-account', $user);
    }

    protected function isNotTeacher()
    {
        return \Gate::denies('teacher');
    }

    protected function isNotStudent()
    {
        return \Gate::denies('student');
    }
}
