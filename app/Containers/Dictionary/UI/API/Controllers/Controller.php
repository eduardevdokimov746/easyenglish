<?php

namespace App\Containers\Dictionary\UI\API\Controllers;

use App\Containers\Dictionary\UI\API\Requests\CreateDictionaryRequest;
use App\Containers\Dictionary\UI\API\Requests\DeleteDictionaryRequest;
use App\Containers\Dictionary\UI\API\Requests\GetAllDictionariesRequest;
use App\Containers\Dictionary\UI\API\Requests\FindDictionaryByIdRequest;
use App\Containers\Dictionary\UI\API\Requests\UpdateDictionaryRequest;
use App\Containers\Dictionary\UI\API\Transformers\DictionaryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Dictionary\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDictionaryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDictionary(CreateDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@CreateDictionaryAction', [$request]);

        return $this->created($this->transform($dictionary, DictionaryTransformer::class));
    }

    /**
     * @param FindDictionaryByIdRequest $request
     * @return array
     */
    public function findDictionaryById(FindDictionaryByIdRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@FindDictionaryByIdAction', [$request]);

        return $this->transform($dictionary, DictionaryTransformer::class);
    }

    /**
     * @param GetAllDictionariesRequest $request
     * @return array
     */
    public function getAllDictionaries(GetAllDictionariesRequest $request)
    {
        $dictionaries = Apiato::call('Dictionary@GetAllDictionariesAction', [$request]);

        return $this->transform($dictionaries, DictionaryTransformer::class);
    }

    /**
     * @param UpdateDictionaryRequest $request
     * @return array
     */
    public function updateDictionary(UpdateDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@UpdateDictionaryAction', [$request]);

        return $this->transform($dictionary, DictionaryTransformer::class);
    }

    /**
     * @param DeleteDictionaryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDictionary(DeleteDictionaryRequest $request)
    {
        Apiato::call('Dictionary@DeleteDictionaryAction', [$request]);

        return $this->noContent();
    }
}
