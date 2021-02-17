<?php

namespace App\Containers\Teacher\UI\WEB\Controllers;

use App\Containers\Teacher\UI\WEB\Requests\CreateTeacherRequest;
use App\Containers\Teacher\UI\WEB\Requests\DeleteTeacherRequest;
use App\Containers\Teacher\UI\WEB\Requests\GetAllTeachersRequest;
use App\Containers\Teacher\UI\WEB\Requests\FindTeacherByIdRequest;
use App\Containers\Teacher\UI\WEB\Requests\UpdateTeacherRequest;
use App\Containers\Teacher\UI\WEB\Requests\StoreTeacherRequest;
use App\Containers\Teacher\UI\WEB\Requests\EditTeacherRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Teacher\UI\WEB\Controllers
 */
class MaterialController extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllTeachersRequest $request
     */
    public function index()
    {
        return view('teacher::teacher_practices_index');
    }

    /**
     * Show one entity
     *
     * @param FindTeacherByIdRequest $request
     */
    public function show()
    {
        return view('teacher::teacher_courses_show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateTeacherRequest $request
     */
    public function create(CreateTeacherRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreTeacherRequest $request
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@CreateTeacherAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditTeacherRequest $request
     */
    public function edit()
    {
        return view('teacher::teacher_course_section_edit');
    }

    /**
     * Update a given entity
     *
     * @param UpdateTeacherRequest $request
     */
    public function update(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteTeacherRequest $request
     */
    public function delete(DeleteTeacherRequest $request)
    {
        $result = Apiato::call('Teacher@DeleteTeacherAction', [$request]);

        // ..
    }
}
