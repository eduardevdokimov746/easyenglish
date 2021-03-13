<?php

namespace App\Containers\AdminSection\Index\UI\WEB\Controllers;

use App\Containers\Index1\UI\WEB\Requests\CreateIndex1Request;
use App\Containers\Index1\UI\WEB\Requests\DeleteIndex1Request;
use App\Containers\Index1\UI\WEB\Requests\GetAllIndex1sRequest;
use App\Containers\Index1\UI\WEB\Requests\FindIndex1ByIdRequest;
use App\Containers\Index1\UI\WEB\Requests\UpdateIndex1Request;
use App\Containers\Index1\UI\WEB\Requests\StoreIndex1Request;
use App\Containers\Index1\UI\WEB\Requests\EditIndex1Request;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Index1\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllIndex1sRequest $request
     */
    public function index()
    {
        return view('adminsection/index::index');
    }

    /**
     * Show one entity
     *
     * @param FindIndex1ByIdRequest $request
     */
    public function show(FindIndex1ByIdRequest $request)
    {
        $index1 = Apiato::call('Index1@FindIndex1ByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateIndex1Request $request
     */
    public function create(CreateIndex1Request $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreIndex1Request $request
     */
    public function store(StoreIndex1Request $request)
    {
        $index1 = Apiato::call('Index1@CreateIndex1Action', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditIndex1Request $request
     */
    public function edit(EditIndex1Request $request)
    {
        $index1 = Apiato::call('Index1@GetIndex1ByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateIndex1Request $request
     */
    public function update(UpdateIndex1Request $request)
    {
        $index1 = Apiato::call('Index1@UpdateIndex1Action', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteIndex1Request $request
     */
    public function delete(DeleteIndex1Request $request)
    {
         $result = Apiato::call('Index1@DeleteIndex1Action', [$request]);

         // ..
    }
}
