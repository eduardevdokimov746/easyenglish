<?php

namespace App\Containers\Material\UI\WEB\Controllers;

use App\Containers\Material\UI\WEB\Requests\CreateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\DeleteMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\GetAllMaterialsRequest;
use App\Containers\Material\UI\WEB\Requests\FindMaterialByIdRequest;
use App\Containers\Material\UI\WEB\Requests\UpdateMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\StoreMaterialRequest;
use App\Containers\Material\UI\WEB\Requests\EditMaterialRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Carbon\Carbon;
use WebSocket\Client;

class Controller extends WebController
{
    public function index()
    {
        return view('material::index');
    }

    public function my()
    {
        return view('material::my');
    }

    public function show($id)
    {
       // $material = Apiato::call('Material@FindMaterialByIdAction', [$request]);

        // ..

        $countNoticeChat = \Apiato::call('Chat@GetCountNoticeAction');

        return view('material::show', compact('countNoticeChat'));
    }

    public function create(CreateMaterialRequest $request)
    {
        // ..
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = Apiato::call('Material@CreateMaterialAction', [$request]);

        // ..
    }

    public function edit(EditMaterialRequest $request)
    {
        $material = Apiato::call('Material@GetMaterialByIdAction', [$request]);

        // ..
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
