<?php

namespace App\Containers\Practice\UI\API\Controllers;

use App\Containers\Practice\UI\API\Requests\CreatePracticeRequest;
use App\Containers\Practice\UI\API\Requests\DeletePracticeRequest;
use App\Containers\Practice\UI\API\Requests\GetAllPracticesRequest;
use App\Containers\Practice\UI\API\Requests\FindPracticeByIdRequest;
use App\Containers\Practice\UI\API\Requests\UpdatePracticeRequest;
use App\Containers\Practice\UI\API\Transformers\PracticeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Practice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePracticeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPractice(CreatePracticeRequest $request)
    {
        $practice = Apiato::call('Practice@CreatePracticeAction', [$request]);

        return $this->created($this->transform($practice, PracticeTransformer::class));
    }

    /**
     * @param FindPracticeByIdRequest $request
     * @return array
     */
    public function findPracticeById(FindPracticeByIdRequest $request)
    {
        $practice = Apiato::call('Practice@FindPracticeByIdAction', [$request]);

        return $this->transform($practice, PracticeTransformer::class);
    }

    /**
     * @param GetAllPracticesRequest $request
     * @return array
     */
    public function getAllPractices(GetAllPracticesRequest $request)
    {
        $practices = Apiato::call('Practice@GetAllPracticesAction', [$request]);

        return $this->transform($practices, PracticeTransformer::class);
    }

    /**
     * @param UpdatePracticeRequest $request
     * @return array
     */
    public function updatePractice(UpdatePracticeRequest $request)
    {
        $practice = Apiato::call('Practice@UpdatePracticeAction', [$request]);

        return $this->transform($practice, PracticeTransformer::class);
    }

    /**
     * @param DeletePracticeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePractice(DeletePracticeRequest $request)
    {
        Apiato::call('Practice@DeletePracticeAction', [$request]);

        return $this->noContent();
    }
}
