<?php

namespace App\Containers\StudentSection\Course\UI\WEB\Controllers;

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
        return view('studentsection/course::index');
    }

    /**
     * Show one entity
     *
     * @param FindCourseByIdRequest $request
     */
    public function show()
    {
        return view('studentsection/course::show');
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
