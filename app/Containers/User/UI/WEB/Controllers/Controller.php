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
use App\Containers\User\Models\User;
use App\Containers\User\Exceptions\OldPasswordNotValidException;

class Controller extends WebController
{
    public function index(GetAllUsersRequest $request)
    {
        $users = Apiato::call('User@GetAllUsersAction', [$request]);

        // ..
    }

    public function show($login)
    {
        $user = \Apiato::call('User@FindUserByLoginAction', [$login]);

        if (is_null($user)) {
            return redirect()->route('index');
        }

        return view('user::show', compact('user'));
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

    public function edit($login)
    {
        $user = \Apiato::call('User@FindUserByLoginAction', [$login]);

        if (is_null($user) || $this->isNotMyAccount($user)) {
            return redirect()->route('index');
        }

        return view('user::edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = \Apiato::call('User@FindUserByLoginAction', [$request->get('users')['login']]);

        if (is_null($user) || $this->isNotMyAccount($user)) {
            return redirect()->route('index');
        }

        try {
            \Apiato::call('User@UpdateUserAction', [$user->id, $request]);
        } catch (OldPasswordNotValidException $e) {
            return back()->withErrors(['old_password_not_valid' => $e->getMessage()]);
        }

        $user = \Apiato::call('User@FindUserByLoginAction', [$request->get('users')['login']]);

        \Auth::login($user, \Auth::viaRemember());

        return back()->with(['success-notice' => __('ship::action.data-success-updated')]);
    }

    public function delete(DeleteUserRequest $request)
    {
         $result = Apiato::call('User@DeleteUserAction', [$request]);

         // ..
    }
}
