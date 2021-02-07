<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\Jobs\TestJob;
use App\Containers\User\Models\User;
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
//        Apiato::call('User@GetAllUsersAction');

        //$users = User::get()->toJson();

        return view('user::index');
    }

    /**
     * Show one entity
     *
     * @param FindUserByIdRequest $request
     */
    public function show(\Illuminate\Http\Request $request)
    {
//        $client = new Client("ws://127.0.0.1:5555");
//        $client->text("Hello WebSocket.org!");
//        $client->close();

        dispatch(new TestJob($request->topic, $request->msg))->onQueue('messages');

    }

    /**
     * Create entity (show UI)
     *
     * @param CreateUserRequest $request
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Add a new entity
     *
     * @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {
       // return $this->validate(request(), ['login' => 'required'])->get('login');
        return $request->validated();
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditUserRequest $request
     */
    public function edit(EditUserRequest $request)
    {
        $user = Apiato::call('User@GetUserByIdAction', [$request]);

        // ..
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
