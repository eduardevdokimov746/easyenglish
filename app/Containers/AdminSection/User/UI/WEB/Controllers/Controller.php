<?php

namespace App\Containers\AdminSection\User\UI\WEB\Controllers;

use App\Containers\AdminSection\User\UI\WEB\Requests\UpdateUserRequest;
use App\Containers\AdminSection\User\UI\WEB\Requests\StoreUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        $users = \Apiato::call('AdminSection\User@GetAllUsersAction', [request()->get('role', 'student')]);

        return view('adminsection/user::index', compact('users'));
    }

    public function create()
    {
        $groups = \Apiato::call('TeacherSection\Group@GetAllGroupsAction');

        return view('adminsection/user::create', compact('groups'));
    }

    public function store(StoreUserRequest $request)
    {
        try{
            $user = \Apiato::call('AdminSection\User@CreateUserAction', [$request]);

            return redirect()->route('web_admin_users_edit', [$user->id])->with(['success-notice' => __('adminsection/user::action.create-user')]);
        }catch (\Exception){
            return abort('500')->with(['danger-notice' => __('ship::validation.error-server')]);
        }
    }

    public function edit($id)
    {
        $user = \Apiato::call('User@FindUserByIdAction', [$id]);
        $groups = \Apiato::call('TeacherSection\Group@GetAllGroupsAction');

        return view('adminsection/user::edit', compact('user', 'groups'));
    }

    public function update(UpdateUserRequest $request)
    {
        try{
            \Apiato::call('AdminSection\User@UpdateUserAction', [$request->get('id'), $request]);

            return redirect()->route('web_admin_users_edit', [$request->get('id')])->with(['success-notice' => __('ship::action.data-success-updated')]);
        }catch (\Exception){
            return abort('500')->with(['danger-notice' => __('ship::validation.error-server')]);
        }
    }

    public function delete()
    {
        $isSuccess = \Apiato::call('AdminSection\User@DeleteUserAction', [request()->id]);

        if ($isSuccess) {
            return back()->with(['success-notice' => __('adminsection/user::action.delete-user')]);
        }

        return back()->with(['danger-notice' => __('ship::validation.error-server')]);
    }
}
