<?php

namespace App\Containers\Dictionary\UI\WEB\Controllers;

use App\Containers\Dictionary\UI\WEB\Requests\CreateDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\DeleteDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\GetAllDictionariesRequest;
use App\Containers\Dictionary\UI\WEB\Requests\FindDictionaryByIdRequest;
use App\Containers\Dictionary\UI\WEB\Requests\UpdateDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\StoreDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\EditDictionaryRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Dictionary\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllDictionariesRequest $request
     */
    public function index()
    {
        //$dictionaries = Apiato::call('Dictionary@GetAllDictionariesAction', [$request]);

        // ..

        return view('dictionary::index');
    }

    /**
     * Show one entity
     *
     * @param FindDictionaryByIdRequest $request
     */
    public function show(FindDictionaryByIdRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@FindDictionaryByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateDictionaryRequest $request
     */
    public function create(CreateDictionaryRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreDictionaryRequest $request
     */
    public function store(StoreDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@CreateDictionaryAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditDictionaryRequest $request
     */
    public function edit(EditDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@GetDictionaryByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateDictionaryRequest $request
     */
    public function update(UpdateDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@UpdateDictionaryAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteDictionaryRequest $request
     */
    public function delete(DeleteDictionaryRequest $request)
    {
         $result = Apiato::call('Dictionary@DeleteDictionaryAction', [$request]);

         // ..
    }
}
