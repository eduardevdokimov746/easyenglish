<?php

namespace App\Containers\ResponseTeacher\UI\API\Controllers;

use App\Containers\ResponseTeacher\UI\API\Requests\CreateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\API\Requests\DeleteResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\API\Requests\GetAllResponseTeachersRequest;
use App\Containers\ResponseTeacher\UI\API\Requests\FindResponseTeacherByIdRequest;
use App\Containers\ResponseTeacher\UI\API\Requests\UpdateResponseTeacherRequest;
use App\Containers\ResponseTeacher\UI\API\Transformers\ResponseTeacherTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ResponseTeacher\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateResponseTeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createResponseTeacher(CreateResponseTeacherRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@CreateResponseTeacherAction', [$request]);

        return $this->created($this->transform($responseteacher, ResponseTeacherTransformer::class));
    }

    /**
     * @param FindResponseTeacherByIdRequest $request
     * @return array
     */
    public function findResponseTeacherById(FindResponseTeacherByIdRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@FindResponseTeacherByIdAction', [$request]);

        return $this->transform($responseteacher, ResponseTeacherTransformer::class);
    }

    /**
     * @param GetAllResponseTeachersRequest $request
     * @return array
     */
    public function getAllResponseTeachers(GetAllResponseTeachersRequest $request)
    {
        $responseteachers = Apiato::call('ResponseTeacher@GetAllResponseTeachersAction', [$request]);

        return $this->transform($responseteachers, ResponseTeacherTransformer::class);
    }

    /**
     * @param UpdateResponseTeacherRequest $request
     * @return array
     */
    public function updateResponseTeacher(UpdateResponseTeacherRequest $request)
    {
        $responseteacher = Apiato::call('ResponseTeacher@UpdateResponseTeacherAction', [$request]);

        return $this->transform($responseteacher, ResponseTeacherTransformer::class);
    }

    /**
     * @param DeleteResponseTeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteResponseTeacher(DeleteResponseTeacherRequest $request)
    {
        Apiato::call('ResponseTeacher@DeleteResponseTeacherAction', [$request]);

        return $this->noContent();
    }
}
