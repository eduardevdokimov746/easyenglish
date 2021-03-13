<?php

namespace App\Containers\Auth\UI\API\Controllers;

use App\Containers\Auth\UI\API\Requests\CreateAuthRequest;
use App\Containers\Auth\UI\API\Requests\DeleteAuthRequest;
use App\Containers\Auth\UI\API\Requests\GetAllAuthsRequest;
use App\Containers\Auth\UI\API\Requests\FindAuthByIdRequest;
use App\Containers\Auth\UI\API\Requests\UpdateAuthRequest;
use App\Containers\Auth\UI\API\Transformers\AuthTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Auth\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAuth(CreateAuthRequest $request)
    {
        $auth = Apiato::call('Auth@CreateAuthAction', [$request]);

        return $this->created($this->transform($auth, AuthTransformer::class));
    }

    /**
     * @param FindAuthByIdRequest $request
     * @return array
     */
    public function findAuthById(FindAuthByIdRequest $request)
    {
        $auth = Apiato::call('Auth@FindAuthByIdAction', [$request]);

        return $this->transform($auth, AuthTransformer::class);
    }

    /**
     * @param GetAllAuthsRequest $request
     * @return array
     */
    public function getAllAuths(GetAllAuthsRequest $request)
    {
        $auths = Apiato::call('Auth@GetAllAuthsAction', [$request]);

        return $this->transform($auths, AuthTransformer::class);
    }

    /**
     * @param UpdateAuthRequest $request
     * @return array
     */
    public function updateAuth(UpdateAuthRequest $request)
    {
        $auth = Apiato::call('Auth@UpdateAuthAction', [$request]);

        return $this->transform($auth, AuthTransformer::class);
    }

    /**
     * @param DeleteAuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAuth(DeleteAuthRequest $request)
    {
        Apiato::call('Auth@DeleteAuthAction', [$request]);

        return $this->noContent();
    }
}
