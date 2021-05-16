<?php

namespace App\Containers\TeacherSection\Material\UI\WEB\Controllers;

use App\Containers\Material\UI\WEB\Requests\CreateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\DeleteMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\GetAllMaterialsRequest;
use App\Containers\Material\UI\WEB\Requests\FindMaterialByIdRequest;
use App\Containers\Material\UI\WEB\Requests\UpdateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\StoreMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\EditMaterialRequest;
use App\Containers\TeacherSection\Material\UI\WEB\Requests\PrepareTextRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        $activePavItem = 'materials';

        return view('teachersection/material::index', compact('activePavItem'));
    }

    public function show(FindMaterialByIdRequest $request)
    {
        $material = Apiato::call('Material@FindMaterialByIdAction', [$request]);

        // ..
    }

    public function create()
    {
        return view('teachersection/material::create');
    }

    public function prepareText(PrepareTextRequest $request)
    {
        $text = \Apiato::call('TeacherSection\Material@PrepareTextAction', [$request]);

        $plainTitle = $request->get('plain_title');
        $plainText = $request->get('plain_text');
        $htmlTitle = $text['html_title'];
        $htmlText = $text['html_text'];
        $isAutogenerate = $request->filled('auto-generate');
        $isPrepare = true;
        $newWords = $text['newWords'];

        return view('teachersection/material::create', compact(
            'plainTitle',
            'plainText',
            'htmlTitle',
            'htmlText',
            'isAutogenerate',
            'isPrepare',
            'newWords'
        ));
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = Apiato::call('Material@CreateMaterialAction', [$request]);

        // ..
    }

    public function edit()
    {
        return view('teachersection/material::edit');
    }

    public function update(UpdateMaterialRequest $request)
    {
        $material = Apiato::call('Material@UpdateMaterialAction', [$request]);

        // ..
    }

    public function delete(DeleteMaterialRequest $request)
    {
         $result = Apiato::call('Material@DeleteMaterialAction', [$request]);

         // ..
    }
}
