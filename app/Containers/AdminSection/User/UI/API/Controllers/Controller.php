<?php

namespace App\Containers\User1\UI\API\Controllers;

use App\Containers\User1\UI\API\Requests\CreateUser1Request;
use App\Containers\User1\UI\API\Requests\DeleteUser1Request;
use App\Containers\User1\UI\API\Requests\GetAllUser1sRequest;
use App\Containers\User1\UI\API\Requests\FindUser1ByIdRequest;
use App\Containers\User1\UI\API\Requests\UpdateUser1Request;
use App\Containers\User1\UI\API\Transformers\User1Transformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\User1\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateUser1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser1(CreateUser1Request $request)
    {
        $user1 = Apiato::call('User1@CreateUser1Action', [$request]);

        return $this->created($this->transform($user1, User1Transformer::class));
    }

    /**
     * @param FindUser1ByIdRequest $request
     * @return array
     */
    public function findUser1ById(FindUser1ByIdRequest $request)
    {
        $user1 = Apiato::call('User1@FindUser1ByIdAction', [$request]);

        return $this->transform($user1, User1Transformer::class);
    }

    /**
     * @param GetAllUser1sRequest $request
     * @return array
     */
    public function getAllUser1s(GetAllUser1sRequest $request)
    {
        $user1s = Apiato::call('User1@GetAllUser1sAction', [$request]);

        return $this->transform($user1s, User1Transformer::class);
    }

    /**
     * @param UpdateUser1Request $request
     * @return array
     */
    public function updateUser1(UpdateUser1Request $request)
    {
        $user1 = Apiato::call('User1@UpdateUser1Action', [$request]);

        return $this->transform($user1, User1Transformer::class);
    }

    /**
     * @param DeleteUser1Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser1(DeleteUser1Request $request)
    {
        Apiato::call('User1@DeleteUser1Action', [$request]);

        return $this->noContent();
    }
}
