<?php

namespace App\Containers\TeacherSection\Material\UI\API\Controllers;

use App\Containers\Material\UI\API\Requests\CreateMaterialRequest;
use App\Containers\Material\UI\API\Requests\DeleteMaterialRequest;
use App\Containers\Material\UI\API\Requests\GetAllMaterialsRequest;
use App\Containers\Material\UI\API\Requests\FindMaterialByIdRequest;
use App\Containers\Material\UI\API\Requests\UpdateMaterialRequest;
use App\Containers\Material\UI\API\Transformers\MaterialTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Material\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMaterialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMaterial(CreateMaterialRequest $request)
    {
        $material = Apiato::call('Material@CreateMaterialAction', [$request]);

        return $this->created($this->transform($material, MaterialTransformer::class));
    }

    /**
     * @param FindMaterialByIdRequest $request
     * @return array
     */
    public function findMaterialById(FindMaterialByIdRequest $request)
    {
        $material = Apiato::call('Material@FindMaterialByIdAction', [$request]);

        return $this->transform($material, MaterialTransformer::class);
    }

    /**
     * @param GetAllMaterialsRequest $request
     * @return array
     */
    public function getAllMaterials(GetAllMaterialsRequest $request)
    {
        $materials = Apiato::call('Material@GetAllMaterialsAction', [$request]);

        return $this->transform($materials, MaterialTransformer::class);
    }

    /**
     * @param UpdateMaterialRequest $request
     * @return array
     */
    public function updateMaterial(UpdateMaterialRequest $request)
    {
        $material = Apiato::call('Material@UpdateMaterialAction', [$request]);

        return $this->transform($material, MaterialTransformer::class);
    }

    /**
     * @param DeleteMaterialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMaterial(DeleteMaterialRequest $request)
    {
        Apiato::call('Material@DeleteMaterialAction', [$request]);

        return $this->noContent();
    }
}
