<?php

namespace App\Containers\StudentSection\Section\UI\WEB\Controllers;

use App\Containers\Section\UI\WEB\Requests\CreateSectionRequest;
use App\Containers\Section\UI\WEB\Requests\DeleteSectionRequest;
use App\Containers\Section\UI\WEB\Requests\GetAllSectionsRequest;
use App\Containers\Section\UI\WEB\Requests\FindSectionByIdRequest;
use App\Containers\Section\UI\WEB\Requests\UpdateSectionRequest;
use App\Containers\Section\UI\WEB\Requests\StoreSectionRequest;
use App\Containers\Section\UI\WEB\Requests\EditSectionRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Section\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllSectionsRequest $request
     */
    public function index(GetAllSectionsRequest $request)
    {
        $sections = Apiato::call('Section@GetAllSectionsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindSectionByIdRequest $request
     */
    public function show(FindSectionByIdRequest $request)
    {
        $section = Apiato::call('Section@FindSectionByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateSectionRequest $request
     */
    public function create(CreateSectionRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreSectionRequest $request
     */
    public function store(StoreSectionRequest $request)
    {
        $section = Apiato::call('Section@CreateSectionAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditSectionRequest $request
     */
    public function edit(EditSectionRequest $request)
    {
        $section = Apiato::call('Section@GetSectionByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateSectionRequest $request
     */
    public function update(UpdateSectionRequest $request)
    {
        $section = Apiato::call('Section@UpdateSectionAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteSectionRequest $request
     */
    public function delete(DeleteSectionRequest $request)
    {
         $result = Apiato::call('Section@DeleteSectionAction', [$request]);

         // ..
    }
}
