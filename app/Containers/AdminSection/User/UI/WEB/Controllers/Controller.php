<?php

namespace App\Containers\AdminSection\User\UI\WEB\Controllers;

use App\Containers\User1\UI\WEB\Requests\CreateUser1Request;
use App\Containers\User1\UI\WEB\Requests\DeleteUser1Request;
use App\Containers\User1\UI\WEB\Requests\GetAllUser1sRequest;
use App\Containers\User1\UI\WEB\Requests\FindUser1ByIdRequest;
use App\Containers\User1\UI\WEB\Requests\UpdateUser1Request;
use App\Containers\AdminSection\User\UI\WEB\Requests\StoreUserRequest;
use App\Containers\User1\UI\WEB\Requests\EditUser1Request;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        $users = \Apiato::call('AdminSection\User@GetAllUsersAction', [request()->get('role', 'student')]);

        return view('adminsection/user::index', compact('users'));
    }

    public function show(FindUser1ByIdRequest $request)
    {
        $user1 = Apiato::call('User1@FindUser1ByIdAction', [$request]);

        // ..
    }

    public function create()
    {
        return view('adminsection/user::create');
    }

    public function store()
    {
        dd(request()->all());
    }

    public function edit()
    {
        return view('adminsection/user::edit');
    }

    public function update(UpdateUser1Request $request)
    {
        $user1 = Apiato::call('User1@UpdateUser1Action', [$request]);

        // ..
    }

    public function delete(DeleteUser1Request $request)
    {
         $result = Apiato::call('User1@DeleteUser1Action', [$request]);

         // ..
    }
}
