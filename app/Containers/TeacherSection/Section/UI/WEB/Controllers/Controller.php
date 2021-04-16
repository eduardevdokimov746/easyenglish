<?php

namespace App\Containers\TeacherSection\Section\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TeacherSection\Section\UI\WEB\Requests\StoreSectionRequest;

class Controller extends WebController
{

    public function index(GetAllSectionsRequest $request)
    {
        $sections = Apiato::call('Section@GetAllSectionsAction', [$request]);

        // ..
    }

    public function show(FindSectionByIdRequest $request)
    {
        $section = Apiato::call('Section@FindSectionByIdAction', [$request]);

        // ..
    }

    public function create(CreateSectionRequest $request)
    {
        // ..
    }

    public function store(StoreSectionRequest $request)
    {
        return $request->all();
    }

    public function edit()
    {
        return view('teachersection/section::edit');
    }

    public function update(UpdateSectionRequest $request)
    {
        $section = Apiato::call('Section@UpdateSectionAction', [$request]);

        // ..
    }

    public function delete(DeleteSectionRequest $request)
    {
         $result = Apiato::call('Section@DeleteSectionAction', [$request]);

         // ..
    }
}
