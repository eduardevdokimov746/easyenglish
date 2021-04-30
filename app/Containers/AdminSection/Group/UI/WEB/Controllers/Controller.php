<?php

namespace App\Containers\AdminSection\Group\UI\WEB\Controllers;

use App\Containers\AdminSection\Group\UI\WEB\Requests\UpdateGroupRequest;
use App\Containers\AdminSection\Group\UI\WEB\Requests\StoreGroupRequest;
use App\Containers\User\Models\User;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        $groups = \Apiato::call('AdminSection\Group@GetAllGroupsAction');

        return view('adminsection/group::index', compact('groups'));
    }

    public function create()
    {
        $students = \Apiato::call('AdminSection\User@GetAllStudentsAction');

        return view('adminsection/group::create', compact('students'));
    }

    public function store(StoreGroupRequest $request)
    {
        try {
            \Apiato::call('AdminSection\Group@CreateGroupAction', [$request]);

            return json_encode(['msg' => __('ship::action.created-group')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $students = \Apiato::call('AdminSection\User@GetAllStudentsAction');
        $group = \Apiato::call('AdminSection\Group@FindGroupByIdAction', [$id]);

        return view('adminsection/group::edit', compact('students', 'group'));
    }

    public function update(UpdateGroupRequest $request)
    {
        try {
            \Apiato::call('AdminSection\Group@UpdateGroupAction', [$request]);
            return json_encode(['msg' => __('ship::action.updated-group')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        try {
            \Apiato::call('AdminSection\Group@DeleteGroupAction', [$id]);
            return back()->with(['success-notice' => __('ship::action.deleted-group')]);
        } catch (\Exception) {
            return back()->with(['danger-notice' => __('ship::validation.error-server')]);
        }
    }
}
