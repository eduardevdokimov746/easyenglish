<?php

namespace App\Containers\Course\UI\WEB\Controllers;

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
 * @package App\Containers\Course\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllCoursesRequest $request
     */
    public function index()
    {
        return view('course::index');
    }

    /**
     * Show one entity
     *
     * @param FindCourseByIdRequest $request
     */
    public function show()
    {
        return view('course::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateCourseRequest $request
     */
    public function create(CreateCourseRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreCourseRequest $request
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Apiato::call('Course@CreateCourseAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditCourseRequest $request
     */
    public function edit(EditCourseRequest $request)
    {
        $course = Apiato::call('Course@GetCourseByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateCourseRequest $request
     */
    public function update(UpdateCourseRequest $request)
    {
        $course = Apiato::call('Course@UpdateCourseAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteCourseRequest $request
     */
    public function delete(DeleteCourseRequest $request)
    {
         $result = Apiato::call('Course@DeleteCourseAction', [$request]);

         // ..
    }
}
