<?php

namespace App\Containers\Section\UI\API\Controllers;

use App\Containers\Section\UI\API\Requests\CreateSectionRequest;
use App\Containers\Section\UI\API\Requests\DeleteSectionRequest;
use App\Containers\Section\UI\API\Requests\GetAllSectionsRequest;
use App\Containers\Section\UI\API\Requests\FindSectionByIdRequest;
use App\Containers\Section\UI\API\Requests\UpdateSectionRequest;
use App\Containers\Section\UI\API\Transformers\SectionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Section\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSection(CreateSectionRequest $request)
    {
        $section = Apiato::call('Section@CreateSectionAction', [$request]);

        return $this->created($this->transform($section, SectionTransformer::class));
    }

    /**
     * @param FindSectionByIdRequest $request
     * @return array
     */
    public function findSectionById(FindSectionByIdRequest $request)
    {
        $section = Apiato::call('Section@FindSectionByIdAction', [$request]);

        return $this->transform($section, SectionTransformer::class);
    }

    /**
     * @param GetAllSectionsRequest $request
     * @return array
     */
    public function getAllSections(GetAllSectionsRequest $request)
    {
        $sections = Apiato::call('Section@GetAllSectionsAction', [$request]);

        return $this->transform($sections, SectionTransformer::class);
    }

    /**
     * @param UpdateSectionRequest $request
     * @return array
     */
    public function updateSection(UpdateSectionRequest $request)
    {
        $section = Apiato::call('Section@UpdateSectionAction', [$request]);

        return $this->transform($section, SectionTransformer::class);
    }

    /**
     * @param DeleteSectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSection(DeleteSectionRequest $request)
    {
        Apiato::call('Section@DeleteSectionAction', [$request]);

        return $this->noContent();
    }
}
