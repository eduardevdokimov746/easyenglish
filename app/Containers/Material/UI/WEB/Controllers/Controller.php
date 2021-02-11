<?php

namespace App\Containers\Material\UI\WEB\Controllers;

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
        //$materials = Apiato::call('Material@GetAllMaterialsAction', [$request]);

        // ..

        return view('material::index');
    }

    public function my()
    {
        return view('material::my');
    }

    /**
     * Show one entity
     *
     * @param FindMaterialByIdRequest $request
     */
    public function show($id)
    {
       // $material = Apiato::call('Material@FindMaterialByIdAction', [$request]);

        // ..

        return view('material::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateMaterialRequest $request
     */
    public function create(CreateMaterialRequest $request)
    {
        // ..
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
    public function edit(EditMaterialRequest $request)
    {
        $material = Apiato::call('Material@GetMaterialByIdAction', [$request]);

        // ..
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
