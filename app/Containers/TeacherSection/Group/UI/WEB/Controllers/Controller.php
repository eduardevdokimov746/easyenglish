<?php

namespace App\Containers\TeacherSection\Group\UI\WEB\Controllers;

use App\Containers\Group\UI\WEB\Requests\CreateGroupRequest;
use App\Containers\Group\UI\WEB\Requests\DeleteGroupRequest;
use App\Containers\Group\UI\WEB\Requests\GetAllGroupsRequest;
use App\Containers\Group\UI\WEB\Requests\FindGroupByIdRequest;
use App\Containers\Group\UI\WEB\Requests\UpdateGroupRequest;
use App\Containers\Group\UI\WEB\Requests\StoreGroupRequest;
use App\Containers\Group\UI\WEB\Requests\EditGroupRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Group\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllGroupsRequest $request
     */
    public function index()
    {
        return view('teachersection/group::index');
    }

    /**
     * Show one entity
     *
     * @param FindGroupByIdRequest $request
     */
    public function show(FindGroupByIdRequest $request)
    {
        $group = Apiato::call('Group@FindGroupByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateGroupRequest $request
     */
    public function create(CreateGroupRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreGroupRequest $request
     */
    public function store(StoreGroupRequest $request)
    {
        $group = Apiato::call('Group@CreateGroupAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditGroupRequest $request
     */
    public function edit(EditGroupRequest $request)
    {
        $group = Apiato::call('Group@GetGroupByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateGroupRequest $request
     */
    public function update(UpdateGroupRequest $request)
    {
        $group = Apiato::call('Group@UpdateGroupAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteGroupRequest $request
     */
    public function delete(DeleteGroupRequest $request)
    {
         $result = Apiato::call('Group@DeleteGroupAction', [$request]);

         // ..
    }
}
