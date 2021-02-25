<?php

namespace App\Containers\StudentSection\ResponseStudent\UI\WEB\Controllers;

use App\Containers\ResponseStudent\UI\WEB\Requests\CreateResponseStudentRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\DeleteResponseStudentRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\GetAllResponseStudentsRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\FindResponseStudentByIdRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\UpdateResponseStudentRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\StoreResponseStudentRequest;
use App\Containers\ResponseStudent\UI\WEB\Requests\EditResponseStudentRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ResponseStudent\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllResponseStudentsRequest $request
     */
    public function index(GetAllResponseStudentsRequest $request)
    {
        $responsestudents = Apiato::call('ResponseStudent@GetAllResponseStudentsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindResponseStudentByIdRequest $request
     */
    public function show(FindResponseStudentByIdRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@FindResponseStudentByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateResponseStudentRequest $request
     */
    public function create(CreateResponseStudentRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreResponseStudentRequest $request
     */
    public function store(StoreResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@CreateResponseStudentAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditResponseStudentRequest $request
     */
    public function edit(EditResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@GetResponseStudentByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateResponseStudentRequest $request
     */
    public function update(UpdateResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@UpdateResponseStudentAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteResponseStudentRequest $request
     */
    public function delete(DeleteResponseStudentRequest $request)
    {
         $result = Apiato::call('ResponseStudent@DeleteResponseStudentAction', [$request]);

         // ..
    }
}
