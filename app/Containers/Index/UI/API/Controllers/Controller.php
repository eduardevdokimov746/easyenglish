<?php

namespace App\Containers\Index\UI\API\Controllers;

use App\Containers\Index\UI\API\Requests\CreateIndexRequest;
use App\Containers\Index\UI\API\Requests\DeleteIndexRequest;
use App\Containers\Index\UI\API\Requests\GetAllIndicesRequest;
use App\Containers\Index\UI\API\Requests\FindIndexByIdRequest;
use App\Containers\Index\UI\API\Requests\UpdateIndexRequest;
use App\Containers\Index\UI\API\Transformers\IndexTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Index\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createIndex(CreateIndexRequest $request)
    {
        $index = Apiato::call('Index@CreateIndexAction', [$request]);

        return $this->created($this->transform($index, IndexTransformer::class));
    }

    /**
     * @param FindIndexByIdRequest $request
     * @return array
     */
    public function findIndexById(FindIndexByIdRequest $request)
    {
        $index = Apiato::call('Index@FindIndexByIdAction', [$request]);

        return $this->transform($index, IndexTransformer::class);
    }

    /**
     * @param GetAllIndicesRequest $request
     * @return array
     */
    public function getAllIndices(GetAllIndicesRequest $request)
    {
        $indices = Apiato::call('Index@GetAllIndicesAction', [$request]);

        return $this->transform($indices, IndexTransformer::class);
    }

    /**
     * @param UpdateIndexRequest $request
     * @return array
     */
    public function updateIndex(UpdateIndexRequest $request)
    {
        $index = Apiato::call('Index@UpdateIndexAction', [$request]);

        return $this->transform($index, IndexTransformer::class);
    }

    /**
     * @param DeleteIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIndex(DeleteIndexRequest $request)
    {
        Apiato::call('Index@DeleteIndexAction', [$request]);

        return $this->noContent();
    }
}
