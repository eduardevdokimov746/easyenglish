<?php

namespace App\Containers\TeacherSection\Material\UI\WEB\Controllers;

use App\Containers\Material\UI\WEB\Requests\UpdateMaterialRequest;
use App\Containers\TeacherSection\Material\Breadcrumbs\MaterialCreate;
use App\Containers\TeacherSection\Material\Breadcrumbs\MaterialEdit;
use App\Containers\TeacherSection\Material\Breadcrumbs\MaterialList;
use App\Containers\TeacherSection\Material\UI\WEB\Requests\StoreMaterialRequest;
use App\Containers\TeacherSection\Material\UI\WEB\Requests\PrepareTextRequest;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $activePavItem = 'materials';
        $breadcrumb = new MaterialList();

        $materials = \Apiato::call('TeacherSection\Material@GetAllMaterialsAction', [\Auth::id()]);

        return view('teachersection/material::index', compact('activePavItem', 'materials', 'breadcrumb'));
    }

    public function create()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $breadcrumb = new MaterialCreate();

        return view('teachersection/material::create', compact('breadcrumb'));
    }

    public function prepareText(PrepareTextRequest $request)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $text = \Apiato::call('TeacherSection\Material@PrepareTextAction', [$request]);

        $plainTitle = $request->get('plain_title');
        $plainText = $request->get('plain_text');
        $htmlTitle = $text['html_title'];
        $htmlText = $text['html_text'];
        $htmlTitleToDb = $text['html_title_to_db'];
        $htmlTextToDb = $text['html_text_to_db'];
        $isAutogenerate = $request->filled('auto-generate');
        $isPrepare = true;
        $newWords = $text['newWords'];

        $breadcrumb = new MaterialCreate();

        return view('teachersection/material::create', compact(
            'plainTitle',
            'plainText',
            'htmlTitle',
            'htmlText',
            'isAutogenerate',
            'isPrepare',
            'newWords',
            'breadcrumb',
            'htmlTitleToDb',
            'htmlTextToDb'
        ));
    }

    public function prepareTextUpdate($id, PrepareTextRequest $request)
    {
        $material = \Apiato::call('TeacherSection\Material@FindMaterialByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-material', $material)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $text = \Apiato::call('TeacherSection\Material@PrepareTextAction', [$request]);

        $plainTitle = $request->get('plain_title');
        $plainText = $request->get('plain_text');
        $htmlTitle = $text['html_title'];
        $htmlText = $text['html_text'];
        $htmlTitleToDb = $text['html_title_to_db'];
        $htmlTextToDb = $text['html_text_to_db'];
        $isAutogenerate = $request->filled('auto-generate');
        $isPrepare = true;
        $newWords = $text['newWords'];

        $breadcrumb = new MaterialEdit();

        return view('teachersection/material::edit', compact(
            'plainTitle',
            'plainText',
            'htmlTitle',
            'htmlText',
            'isAutogenerate',
            'isPrepare',
            'newWords',
            'material',
            'breadcrumb',
            'htmlTitleToDb',
            'htmlTextToDb'
        ));
    }

    public function store(StoreMaterialRequest $request)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('TeacherSection\Material@CreateMaterialAction', [$request]);
            return json_encode(['msg' => __('teachersection/material::action.created')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $material = \Apiato::call('TeacherSection\Material@FindMaterialByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-material', $material)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $breadcrumb = new MaterialEdit();

        return view('teachersection/material::edit', compact('material', 'breadcrumb'));
    }

    public function update($id, UpdateMaterialRequest $request)
    {
        $material = \Apiato::call('TeacherSection\Material@FindMaterialByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-material', $material)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('TeacherSection\Material@UpdateMaterialAction', [$material, $request]);
            return json_encode(['msg' => __('teachersection/material::action.updated')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
