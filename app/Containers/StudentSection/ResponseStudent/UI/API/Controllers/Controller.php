<?php

namespace App\Containers\ResponseStudent\UI\API\Controllers;

use App\Containers\ResponseStudent\UI\API\Requests\CreateResponseStudentRequest;
use App\Containers\ResponseStudent\UI\API\Requests\DeleteResponseStudentRequest;
use App\Containers\ResponseStudent\UI\API\Requests\GetAllResponseStudentsRequest;
use App\Containers\ResponseStudent\UI\API\Requests\FindResponseStudentByIdRequest;
use App\Containers\ResponseStudent\UI\API\Requests\UpdateResponseStudentRequest;
use App\Containers\ResponseStudent\UI\API\Transformers\ResponseStudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ResponseStudent\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateResponseStudentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createResponseStudent(CreateResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@CreateResponseStudentAction', [$request]);

        return $this->created($this->transform($responsestudent, ResponseStudentTransformer::class));
    }

    /**
     * @param FindResponseStudentByIdRequest $request
     * @return array
     */
    public function findResponseStudentById(FindResponseStudentByIdRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@FindResponseStudentByIdAction', [$request]);

        return $this->transform($responsestudent, ResponseStudentTransformer::class);
    }

    /**
     * @param GetAllResponseStudentsRequest $request
     * @return array
     */
    public function getAllResponseStudents(GetAllResponseStudentsRequest $request)
    {
        $responsestudents = Apiato::call('ResponseStudent@GetAllResponseStudentsAction', [$request]);

        return $this->transform($responsestudents, ResponseStudentTransformer::class);
    }

    /**
     * @param UpdateResponseStudentRequest $request
     * @return array
     */
    public function updateResponseStudent(UpdateResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@UpdateResponseStudentAction', [$request]);

        return $this->transform($responsestudent, ResponseStudentTransformer::class);
    }

    /**
     * @param DeleteResponseStudentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteResponseStudent(DeleteResponseStudentRequest $request)
    {
        Apiato::call('ResponseStudent@DeleteResponseStudentAction', [$request]);

        return $this->noContent();
    }
}
