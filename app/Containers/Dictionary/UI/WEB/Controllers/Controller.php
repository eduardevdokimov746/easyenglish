<?php

namespace App\Containers\Dictionary\UI\WEB\Controllers;

use App\Containers\Dictionary\UI\WEB\Requests\CreateDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\DeleteDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\GetAllDictionariesRequest;
use App\Containers\Dictionary\UI\WEB\Requests\FindDictionaryByIdRequest;
use App\Containers\Dictionary\UI\WEB\Requests\UpdateDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\StoreDictionaryRequest;
use App\Containers\Dictionary\UI\WEB\Requests\EditDictionaryRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        //$dictionaries = Apiato::call('Dictionary@GetAllDictionariesAction', [$request]);

        // ..

        return view('dictionary::index');
    }

    public function show(FindDictionaryByIdRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@FindDictionaryByIdAction', [$request]);

        // ..
    }

    public function create(CreateDictionaryRequest $request)
    {
        // ..
    }

    public function store(StoreDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@CreateDictionaryAction', [$request]);

        // ..
    }

    public function edit(EditDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@GetDictionaryByIdAction', [$request]);

        // ..
    }

    public function update(UpdateDictionaryRequest $request)
    {
        $dictionary = Apiato::call('Dictionary@UpdateDictionaryAction', [$request]);

        // ..
    }

    public function delete(DeleteDictionaryRequest $request)
    {
         $result = Apiato::call('Dictionary@DeleteDictionaryAction', [$request]);

         // ..
    }

    public function getWord()
    {
        try {
            $word = \Apiato::call('Dictionary@FindWordByIdAction', [request()->get('id')]);

            return json_encode($word);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function addNewTranslate()
    {
        try {
            $data = request()->only(['english_word_id', 'user_id', 'translate']);

            $word = \Apiato::call('Dictionary@AddTranslateWordAction', [$data]);

            return json_encode($word);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function deleteTranslate()
    {
        try {
            $count_deleted = \Apiato::call('Dictionary@DeleteTranslateWordAction', [request()->get('id')]);

            return $count_deleted;
        } catch (\Exception) {
            return abort(500);
        }
    }
}
