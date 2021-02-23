<?php

namespace App\Containers\Zadanie\UI\API\Controllers;

use App\Containers\Zadanie\UI\API\Requests\CreateZadanieRequest;
use App\Containers\Zadanie\UI\API\Requests\DeleteZadanieRequest;
use App\Containers\Zadanie\UI\API\Requests\GetAllZadaniesRequest;
use App\Containers\Zadanie\UI\API\Requests\FindZadanieByIdRequest;
use App\Containers\Zadanie\UI\API\Requests\UpdateZadanieRequest;
use App\Containers\Zadanie\UI\API\Transformers\ZadanieTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Zadanie\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateZadanieRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createZadanie(CreateZadanieRequest $request)
    {
        $zadanie = Apiato::call('Zadanie@CreateZadanieAction', [$request]);

        return $this->created($this->transform($zadanie, ZadanieTransformer::class));
    }

    /**
     * @param FindZadanieByIdRequest $request
     * @return array
     */
    public function findZadanieById(FindZadanieByIdRequest $request)
    {
        $zadanie = Apiato::call('Zadanie@FindZadanieByIdAction', [$request]);

        return $this->transform($zadanie, ZadanieTransformer::class);
    }

    /**
     * @param GetAllZadaniesRequest $request
     * @return array
     */
    public function getAllZadanies(GetAllZadaniesRequest $request)
    {
        $zadanies = Apiato::call('Zadanie@GetAllZadaniesAction', [$request]);

        return $this->transform($zadanies, ZadanieTransformer::class);
    }

    /**
     * @param UpdateZadanieRequest $request
     * @return array
     */
    public function updateZadanie(UpdateZadanieRequest $request)
    {
        $zadanie = Apiato::call('Zadanie@UpdateZadanieAction', [$request]);

        return $this->transform($zadanie, ZadanieTransformer::class);
    }

    /**
     * @param DeleteZadanieRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteZadanie(DeleteZadanieRequest $request)
    {
        Apiato::call('Zadanie@DeleteZadanieAction', [$request]);

        return $this->noContent();
    }
}
