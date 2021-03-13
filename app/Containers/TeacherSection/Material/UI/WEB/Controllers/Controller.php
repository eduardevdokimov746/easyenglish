<?php

namespace App\Containers\TeacherSection\Material\UI\WEB\Controllers;

use App\Containers\Material\UI\WEB\Requests\CreateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\DeleteMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\GetAllMaterialsRequest;
use App\Containers\Material\UI\WEB\Requests\FindMaterialByIdRequest;
use App\Containers\Material\UI\WEB\Requests\UpdateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\StoreMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\EditMaterialRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Material\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllMaterialsRequest $request
     */
    public function index()
    {
        return view('teachersection/material::index');
    }

    /**
     * Show one entity
     *
     * @param FindMaterialByIdRequest $request
     */
    public function show(FindMaterialByIdRequest $request)
    {
        $material = Apiato::call('Material@FindMaterialByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateMaterialRequest $request
     */
    public function create()
    {
        return view('teachersection/material::create');
    }

    /**
     * Add a new entity
     *
     * @param StoreMaterialRequest $request
     */
    public function store(StoreMaterialRequest $request)
    {
        $material = Apiato::call('Material@CreateMaterialAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditMaterialRequest $request
     */
    public function edit()
    {
        return view('teachersection/material::edit');
    }

    /**
     * Update a given entity
     *
     * @param UpdateMaterialRequest $request
     */
    public function update(UpdateMaterialRequest $request)
    {
        $material = Apiato::call('Material@UpdateMaterialAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteMaterialRequest $request
     */
    public function delete(DeleteMaterialRequest $request)
    {
         $result = Apiato::call('Material@DeleteMaterialAction', [$request]);

         // ..
    }
}
