<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\UI\WEB\Requests\CreateUserRequest;
use App\Containers\User\UI\WEB\Requests\DeleteUserRequest;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use App\Containers\User\UI\WEB\Requests\FindUserByIdRequest;
use App\Containers\User\UI\WEB\Requests\UpdateUserRequest;
use App\Containers\User\UI\WEB\Requests\StoreUserRequest;
use App\Containers\User\UI\WEB\Requests\EditUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index(GetAllUsersRequest $request)
    {
        $users = Apiato::call('User@GetAllUsersAction', [$request]);

        // ..
    }

    public function show()
    {
        return view('user::show');
    }

    public function create(CreateUserRequest $request)
    {
        // ..
    }

    public function store(StoreUserRequest $request)
    {
        $user = Apiato::call('User@CreateUserAction', [$request]);

        // ..
    }

    public function edit(EditUserRequest $request)
    {
        return view('user::edit');
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Apiato::call('User@UpdateUserAction', [$request]);

        // ..
    }

    public function delete(DeleteUserRequest $request)
    {
         $result = Apiato::call('User@DeleteUserAction', [$request]);

         // ..
    }
}
