<?php

namespace App\Containers\AdminSection\Auth\UI\WEB\Controllers;

use App\Containers\Auth1\UI\WEB\Requests\CreateAuth1Request;
use App\Containers\Auth1\UI\WEB\Requests\DeleteAuth1Request;
use App\Containers\Auth1\UI\WEB\Requests\GetAllAuth1sRequest;
use App\Containers\Auth1\UI\WEB\Requests\FindAuth1ByIdRequest;
use App\Containers\Auth1\UI\WEB\Requests\UpdateAuth1Request;
use App\Containers\Auth1\UI\WEB\Requests\StoreAuth1Request;
use App\Containers\Auth1\UI\WEB\Requests\EditAuth1Request;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class LoginController extends WebController
{
    public function showLoginForm()
    {
        return view('adminsection/auth::login');
    }

    public function login()
    {

    }
}
