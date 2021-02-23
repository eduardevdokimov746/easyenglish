<?php

namespace App\Containers\StudentSection\ResponseTeacher\UI\WEB\Controllers;

use App\Containers\ResponseTeacher\UI\WEB\Requests\CreateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\DeleteResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\GetAllResponseTeachersRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\FindResponseTeacherByIdRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\UpdateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\StoreResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\WEB\Requests\EditResponseTeacherRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ResponseTeacher\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllResponseTeachersRequest $request
     */
    public function index(GetAllResponseTeachersRequest $request)
    {
        $responseteachers = Apiato::call('ResponseTeacher@GetAllResponseTeachersAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindResponseTeacherByIdRequest $request
     */
    public function show(FindResponseTeacherByIdRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@FindResponseTeacherByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateResponseTeacherRequest $request
     */
    public function create(CreateResponseTeacherRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreResponseTeacherRequest $request
     */
    public function store(StoreResponseTeacherRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@CreateResponseTeacherAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditResponseTeacherRequest $request
     */
    public function edit(EditResponseTeacherRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@GetResponseTeacherByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateResponseTeacherRequest $request
     */
    public function update(UpdateResponseTeacherRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@UpdateResponseTeacherAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteResponseTeacherRequest $request
     */
    public function delete(DeleteResponseTeacherRequest $request)
    {
         $result = Apiato::call('ResponseTeacher@DeleteResponseTeacherAction', [$request]);

         // ..
    }
}
