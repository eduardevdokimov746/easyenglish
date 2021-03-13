<?php

namespace App\Containers\User\UI\API\Controllers;

use App\Containers\User\UI\API\Requests\CreateUserRequest;
use App\Containers\User\UI\API\Requests\DeleteUserRequest;
use App\Containers\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\User\UI\API\Requests\FindUserByIdRequest;
use App\Containers\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\User\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(CreateUserRequest $request)
    {
        $user = Apiato::call('User@CreateUserAction', [$request]);

        return $this->created($this->transform($user, UserTransformer::class));
    }

    /**
     * @param FindUserByIdRequest $request
     * @return array
     */
    public function findUserById(FindUserByIdRequest $request)
    {
        $user = Apiato::call('User@FindUserByIdAction', [$request]);

        return $this->transform($user, UserTransformer::class);
    }

    /**
     * @param GetAllUsersRequest $request
     * @return array
     */
    public function getAllUsers(GetAllUsersRequest $request)
    {
        $users = Apiato::call('User@GetAllUsersAction', [$request]);

        return $this->transform($users, UserTransformer::class);
    }

    /**
     * @param UpdateUserRequest $request
     * @return array
     */
    public function updateUser(UpdateUserRequest $request)
    {
        $user = Apiato::call('User@UpdateUserAction', [$request]);

        return $this->transform($user, UserTransformer::class);
    }

    /**
     * @param DeleteUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(DeleteUserRequest $request)
    {
        Apiato::call('User@DeleteUserAction', [$request]);

        return $this->noContent();
    }
}
