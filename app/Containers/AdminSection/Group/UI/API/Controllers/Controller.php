<?php

namespace App\Containers\Group\UI\API\Controllers;

use App\Containers\Group\UI\API\Requests\CreateGroupRequest;
use App\Containers\Group\UI\API\Requests\DeleteGroupRequest;
use App\Containers\Group\UI\API\Requests\GetAllGroupsRequest;
use App\Containers\Group\UI\API\Requests\FindGroupByIdRequest;
use App\Containers\Group\UI\API\Requests\UpdateGroupRequest;
use App\Containers\Group\UI\API\Transformers\GroupTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Group\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createGroup(CreateGroupRequest $request)
    {
        $group = Apiato::call('Group@CreateGroupAction', [$request]);

        return $this->created($this->transform($group, GroupTransformer::class));
    }

    /**
     * @param FindGroupByIdRequest $request
     * @return array
     */
    public function findGroupById(FindGroupByIdRequest $request)
    {
        $group = Apiato::call('Group@FindGroupByIdAction', [$request]);

        return $this->transform($group, GroupTransformer::class);
    }

    /**
     * @param GetAllGroupsRequest $request
     * @return array
     */
    public function getAllGroups(GetAllGroupsRequest $request)
    {
        $groups = Apiato::call('Group@GetAllGroupsAction', [$request]);

        return $this->transform($groups, GroupTransformer::class);
    }

    /**
     * @param UpdateGroupRequest $request
     * @return array
     */
    public function updateGroup(UpdateGroupRequest $request)
    {
        $group = Apiato::call('Group@UpdateGroupAction', [$request]);

        return $this->transform($group, GroupTransformer::class);
    }

    /**
     * @param DeleteGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGroup(DeleteGroupRequest $request)
    {
        Apiato::call('Group@DeleteGroupAction', [$request]);

        return $this->noContent();
    }
}
