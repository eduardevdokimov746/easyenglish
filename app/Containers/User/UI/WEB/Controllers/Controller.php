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

/**
 * Class Controller
 *
 * @package App\Containers\User\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllUsersRequest $request
     */
    public function index(GetAllUsersRequest $request)
    {
        $users = Apiato::call('User@GetAllUsersAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindUserByIdRequest $request
     */
    public function show()
    {
        return view('user::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateUserRequest $request
     */
    public function create(CreateUserRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {
        $user = Apiato::call('User@CreateUserAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditUserRequest $request
     */
    public function edit(EditUserRequest $request)
    {
        return view('user::edit');
    }

    /**
     * Update a given entity
     *
     * @param UpdateUserRequest $request
     */
    public function update(UpdateUserRequest $request)
    {
        $user = Apiato::call('User@UpdateUserAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteUserRequest $request
     */
    public function delete(DeleteUserRequest $request)
    {
         $result = Apiato::call('User@DeleteUserAction', [$request]);

         // ..
    }
}
