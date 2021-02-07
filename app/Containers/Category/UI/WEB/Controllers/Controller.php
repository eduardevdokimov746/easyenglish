<?php

namespace App\Containers\Category\UI\WEB\Controllers;

use App\Containers\Category\UI\WEB\Requests\CreateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\DeleteCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\GetAllCategoriesRequest;
use App\Containers\Category\UI\WEB\Requests\FindCategoryByIdRequest;
use App\Containers\Category\UI\WEB\Requests\UpdateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\StoreCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\EditCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Category\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllCategoriesRequest $request
     */
    public function index(GetAllCategoriesRequest $request)
    {
        $categories = Apiato::call('Category@GetAllCategoriesAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindCategoryByIdRequest $request
     */
    public function show(FindCategoryByIdRequest $request)
    {
        $category = Apiato::call('Category@FindCategoryByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateCategoryRequest $request
     */
    public function create(CreateCategoryRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreCategoryRequest $request
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Apiato::call('Category@CreateCategoryAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditCategoryRequest $request
     */
    public function edit(EditCategoryRequest $request)
    {
        $category = Apiato::call('Category@GetCategoryByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateCategoryRequest $request
     */
    public function update(UpdateCategoryRequest $request)
    {
        $category = Apiato::call('Category@UpdateCategoryAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteCategoryRequest $request
     */
    public function delete(DeleteCategoryRequest $request)
    {
         $result = Apiato::call('Category@DeleteCategoryAction', [$request]);

         // ..
    }
}
