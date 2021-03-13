<?php

namespace App\Containers\Auth1\UI\API\Controllers;

use App\Containers\Auth1\UI\API\Requests\CreateAuth1Request;
use App\Containers\Auth1\UI\API\Requests\DeleteAuth1Request;
use App\Containers\Auth1\UI\API\Requests\GetAllAuth1sRequest;
use App\Containers\Auth1\UI\API\Requests\FindAuth1ByIdRequest;
use App\Containers\Auth1\UI\API\Requests\UpdateAuth1Request;
use App\Containers\Auth1\UI\API\Transformers\Auth1Transformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Auth1\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAuth1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAuth1(CreateAuth1Request $request)
    {
        $auth1 = Apiato::call('Auth1@CreateAuth1Action', [$request]);

        return $this->created($this->transform($auth1, Auth1Transformer::class));
    }

    /**
     * @param FindAuth1ByIdRequest $request
     * @return array
     */
    public function findAuth1ById(FindAuth1ByIdRequest $request)
    {
        $auth1 = Apiato::call('Auth1@FindAuth1ByIdAction', [$request]);

        return $this->transform($auth1, Auth1Transformer::class);
    }

    /**
     * @param GetAllAuth1sRequest $request
     * @return array
     */
    public function getAllAuth1s(GetAllAuth1sRequest $request)
    {
        $auth1s = Apiato::call('Auth1@GetAllAuth1sAction', [$request]);

        return $this->transform($auth1s, Auth1Transformer::class);
    }

    /**
     * @param UpdateAuth1Request $request
     * @return array
     */
    public function updateAuth1(UpdateAuth1Request $request)
    {
        $auth1 = Apiato::call('Auth1@UpdateAuth1Action', [$request]);

        return $this->transform($auth1, Auth1Transformer::class);
    }

    /**
     * @param DeleteAuth1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAuth1(DeleteAuth1Request $request)
    {
        Apiato::call('Auth1@DeleteAuth1Action', [$request]);

        return $this->noContent();
    }
}
