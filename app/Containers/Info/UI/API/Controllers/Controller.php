<?php

namespace App\Containers\Info\UI\API\Controllers;

use App\Containers\Info\UI\API\Requests\CreateInfoRequest;
use App\Containers\Info\UI\API\Requests\DeleteInfoRequest;
use App\Containers\Info\UI\API\Requests\GetAllInfosRequest;
use App\Containers\Info\UI\API\Requests\FindInfoByIdRequest;
use App\Containers\Info\UI\API\Requests\UpdateInfoRequest;
use App\Containers\Info\UI\API\Transformers\InfoTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Info\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateInfoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createInfo(CreateInfoRequest $request)
    {
        $info = Apiato::call('Info@CreateInfoAction', [$request]);

        return $this->created($this->transform($info, InfoTransformer::class));
    }

    /**
     * @param FindInfoByIdRequest $request
     * @return array
     */
    public function findInfoById(FindInfoByIdRequest $request)
    {
        $info = Apiato::call('Info@FindInfoByIdAction', [$request]);

        return $this->transform($info, InfoTransformer::class);
    }

    /**
     * @param GetAllInfosRequest $request
     * @return array
     */
    public function getAllInfos(GetAllInfosRequest $request)
    {
        $infos = Apiato::call('Info@GetAllInfosAction', [$request]);

        return $this->transform($infos, InfoTransformer::class);
    }

    /**
     * @param UpdateInfoRequest $request
     * @return array
     */
    public function updateInfo(UpdateInfoRequest $request)
    {
        $info = Apiato::call('Info@UpdateInfoAction', [$request]);

        return $this->transform($info, InfoTransformer::class);
    }

    /**
     * @param DeleteInfoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteInfo(DeleteInfoRequest $request)
    {
        Apiato::call('Info@DeleteInfoAction', [$request]);

        return $this->noContent();
    }
}
