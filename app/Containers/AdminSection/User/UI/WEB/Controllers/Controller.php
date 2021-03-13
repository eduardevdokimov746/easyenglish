<?php

namespace App\Containers\AdminSection\User\UI\WEB\Controllers;

use App\Containers\User1\UI\WEB\Requests\CreateUser1Request;
use App\Containers\User1\UI\WEB\Requests\DeleteUser1Request;
use App\Containers\User1\UI\WEB\Requests\GetAllUser1sRequest;
use App\Containers\User1\UI\WEB\Requests\FindUser1ByIdRequest;
use App\Containers\User1\UI\WEB\Requests\UpdateUser1Request;
use App\Containers\User1\UI\WEB\Requests\StoreUser1Request;
use App\Containers\User1\UI\WEB\Requests\EditUser1Request;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\User1\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllUser1sRequest $request
     */
    public function index()
    {
        //определяем по ?role=student фильтр. по умолчанию все выбираются
        return view('adminsection/user::index');
    }

    /**
     * Show one entity
     *
     * @param FindUser1ByIdRequest $request
     */
    public function show(FindUser1ByIdRequest $request)
    {
        $user1 = Apiato::call('User1@FindUser1ByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateUser1Request $request
     */
    public function create()
    {
        return view('adminsection/user::create');
    }

    /**
     * Add a new entity
     *
     * @param StoreUser1Request $request
     */
    public function store(StoreUser1Request $request)
    {
        $user1 = Apiato::call('User1@CreateUser1Action', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditUser1Request $request
     */
    public function edit()
    {
        return view('adminsection/user::edit');
    }

    /**
     * Update a given entity
     *
     * @param UpdateUser1Request $request
     */
    public function update(UpdateUser1Request $request)
    {
        $user1 = Apiato::call('User1@UpdateUser1Action', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteUser1Request $request
     */
    public function delete(DeleteUser1Request $request)
    {
         $result = Apiato::call('User1@DeleteUser1Action', [$request]);

         // ..
    }
}
