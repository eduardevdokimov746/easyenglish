<?php

namespace App\Containers\Index1\UI\API\Controllers;

use App\Containers\Index1\UI\API\Requests\CreateIndex1Request;
use App\Containers\Index1\UI\API\Requests\DeleteIndex1Request;
use App\Containers\Index1\UI\API\Requests\GetAllIndex1sRequest;
use App\Containers\Index1\UI\API\Requests\FindIndex1ByIdRequest;
use App\Containers\Index1\UI\API\Requests\UpdateIndex1Request;
use App\Containers\Index1\UI\API\Transformers\Index1Transformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Index1\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateIndex1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createIndex1(CreateIndex1Request $request)
    {
        $index1 = Apiato::call('Index1@CreateIndex1Action', [$request]);

        return $this->created($this->transform($index1, Index1Transformer::class));
    }

    /**
     * @param FindIndex1ByIdRequest $request
     * @return array
     */
    public function findIndex1ById(FindIndex1ByIdRequest $request)
    {
        $index1 = Apiato::call('Index1@FindIndex1ByIdAction', [$request]);

        return $this->transform($index1, Index1Transformer::class);
    }

    /**
     * @param GetAllIndex1sRequest $request
     * @return array
     */
    public function getAllIndex1s(GetAllIndex1sRequest $request)
    {
        $index1s = Apiato::call('Index1@GetAllIndex1sAction', [$request]);

        return $this->transform($index1s, Index1Transformer::class);
    }

    /**
     * @param UpdateIndex1Request $request
     * @return array
     */
    public function updateIndex1(UpdateIndex1Request $request)
    {
        $index1 = Apiato::call('Index1@UpdateIndex1Action', [$request]);

        return $this->transform($index1, Index1Transformer::class);
    }

    /**
     * @param DeleteIndex1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIndex1(DeleteIndex1Request $request)
    {
        Apiato::call('Index1@DeleteIndex1Action', [$request]);

        return $this->noContent();
    }
}
