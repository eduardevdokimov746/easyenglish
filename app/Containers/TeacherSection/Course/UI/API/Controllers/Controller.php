<?php

namespace App\Containers\Course\UI\API\Controllers;

use App\Containers\Course\UI\API\Requests\CreateCourseRequest;
use App\Containers\Course\UI\API\Requests\DeleteCourseRequest;
use App\Containers\Course\UI\API\Requests\GetAllCoursesRequest;
use App\Containers\Course\UI\API\Requests\FindCourseByIdRequest;
use App\Containers\Course\UI\API\Requests\UpdateCourseRequest;
use App\Containers\Course\UI\API\Transformers\CourseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Course\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCourseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCourse(CreateCourseRequest $request)
    {
        $course = Apiato::call('Course@CreateCourseAction', [$request]);

        return $this->created($this->transform($course, CourseTransformer::class));
    }

    /**
     * @param FindCourseByIdRequest $request
     * @return array
     */
    public function findCourseById(FindCourseByIdRequest $request)
    {
        $course = Apiato::call('Course@FindCourseByIdAction', [$request]);

        return $this->transform($course, CourseTransformer::class);
    }

    /**
     * @param GetAllCoursesRequest $request
     * @return array
     */
    public function getAllCourses(GetAllCoursesRequest $request)
    {
        $courses = Apiato::call('Course@GetAllCoursesAction', [$request]);

        return $this->transform($courses, CourseTransformer::class);
    }

    /**
     * @param UpdateCourseRequest $request
     * @return array
     */
    public function updateCourse(UpdateCourseRequest $request)
    {
        $course = Apiato::call('Course@UpdateCourseAction', [$request]);

        return $this->transform($course, CourseTransformer::class);
    }

    /**
     * @param DeleteCourseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCourse(DeleteCourseRequest $request)
    {
        Apiato::call('Course@DeleteCourseAction', [$request]);

        return $this->noContent();
    }
}
