<?php

namespace App\Containers\Zadanie\UI\WEB\Controllers;

use App\Containers\Zadanie\UI\WEB\Requests\CreateZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\DeleteZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\GetAllZadaniesRequest;
use App\Containers\Zadanie\UI\WEB\Requests\FindZadanieByIdRequest;
use App\Containers\Zadanie\UI\WEB\Requests\UpdateZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\StoreZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\EditZadanieRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Zadanie\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllZadaniesRequest $request
     */
    public function index()
    {
        return view('zadanie::index');
    }

    /**
     * Show one entity
     *
     * @param FindZadanieByIdRequest $request
     */
    public function show()
    {
   //     $zadanie = Apiato::call('Zadanie@FindZadanieByIdAction', [$request]);

        // ..

        return view('zadanie::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateZadanieRequest $request
     */
    public function create(CreateZadanieRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreZadanieRequest $request
     */
    public function store()
    {

    }

    /**
     * Edit entity (show UI)
     *
     * @param EditZadanieRequest $request
     */
    public function edit(EditZadanieRequest $request)
    {
        $zadanie = Apiato::call('Zadanie@GetZadanieByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateZadanieRequest $request
     */
    public function update(UpdateZadanieRequest $request)
    {
        $zadanie = Apiato::call('Zadanie@UpdateZadanieAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteZadanieRequest $request
     */
    public function delete(DeleteZadanieRequest $request)
    {
         $result = Apiato::call('Zadanie@DeleteZadanieAction', [$request]);

         // ..
    }
}
