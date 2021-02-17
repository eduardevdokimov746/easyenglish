<?php

namespace App\Containers\Teacher\UI\API\Controllers;

use App\Containers\Teacher\UI\API\Requests\CreateTeacherRequest;
use App\Containers\Teacher\UI\API\Requests\DeleteTeacherRequest;
use App\Containers\Teacher\UI\API\Requests\GetAllTeachersRequest;
use App\Containers\Teacher\UI\API\Requests\FindTeacherByIdRequest;
use App\Containers\Teacher\UI\API\Requests\UpdateTeacherRequest;
use App\Containers\Teacher\UI\API\Transformers\TeacherTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Teacher\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTeacher(CreateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@CreateTeacherAction', [$request]);

        return $this->created($this->transform($teacher, TeacherTransformer::class));
    }

    /**
     * @param FindTeacherByIdRequest $request
     * @return array
     */
    public function findTeacherById(FindTeacherByIdRequest $request)
    {
        $teacher = Apiato::call('Teacher@FindTeacherByIdAction', [$request]);

        return $this->transform($teacher, TeacherTransformer::class);
    }

    /**
     * @param GetAllTeachersRequest $request
     * @return array
     */
    public function getAllTeachers(GetAllTeachersRequest $request)
    {
        $teachers = Apiato::call('Teacher@GetAllTeachersAction', [$request]);

        return $this->transform($teachers, TeacherTransformer::class);
    }

    /**
     * @param UpdateTeacherRequest $request
     * @return array
     */
    public function updateTeacher(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        return $this->transform($teacher, TeacherTransformer::class);
    }

    /**
     * @param DeleteTeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTeacher(DeleteTeacherRequest $request)
    {
        Apiato::call('Teacher@DeleteTeacherAction', [$request]);

        return $this->noContent();
    }
}
