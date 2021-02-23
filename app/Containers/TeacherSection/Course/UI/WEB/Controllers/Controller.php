<?php

namespace App\Containers\TeacherSection\Course\UI\WEB\Controllers;

use App\Containers\Course\UI\WEB\Requests\CreateCourseRequest;
use App\Containers\Course\UI\WEB\Requests\DeleteCourseRequest;
use App\Containers\Course\UI\WEB\Requests\GetAllCoursesRequest;
use App\Containers\Course\UI\WEB\Requests\FindCourseByIdRequest;
use App\Containers\Course\UI\WEB\Requests\UpdateCourseRequest;
use App\Containers\Course\UI\WEB\Requests\StoreCourseRequest;
use App\Containers\Course\UI\WEB\Requests\EditCourseRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Teacher\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllTeachersRequest $request
     */
    public function index()
    {
        return view('teachersection/course::index');
    }

    /**
     * Show one entity
     *
     * @param FindTeacherByIdRequest $request
     */
    public function show()
    {
        return view('teachersection/course::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateTeacherRequest $request
     */
    public function create()
    {
        return view('teachersection/course::create');
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
        //return view('teacher::courses/teacher_courses_section_edit');
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
