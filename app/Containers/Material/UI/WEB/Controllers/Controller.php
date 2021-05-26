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
        $materials = \Apiato::call('Material@GetAllMaterialsAction');

        return view('material::index', compact('materials'));
    }

    public function my()
    {
        return view('material::my');
    }

    public function show($id)
    {
        $material = \Apiato::call('Material@FindMaterialByIdAction', [$id]);
        $dictionary = \Apiato::call('Dictionary@GetUserDictionaryAction', [\Auth::id()]);
        $countNoticeChat = \Apiato::call('Chat@GetCountNoticeAction');

        return view('material::show', compact('countNoticeChat', 'material', 'dictionary'));
    }

    public function addToMy()
    {
        try {
            \Apiato::call('Material@AddToMyAction', [\Auth::id(), request()->get('material_id')]);
            return json_encode(['msg' => __('material::action.add-to-my')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function deleteFromMy()
    {
        try {
            \Apiato::call('Material@DeleteFromMyAction', [\Auth::id(), request()->get('material_id')]);
            return json_encode(['msg' => __('material::action.delete-from-my')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function addLike()
    {
        try {
            \Apiato::call('Material@AddLikeAction', [\Auth::id(), request()->get('material_id')]);
            return 1;
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function addDislike()
    {
        try {
            \Apiato::call('Material@AddDislikeAction', [\Auth::id(), request()->get('material_id')]);
            return 1;
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function deleteLike()
    {
        try {
            \Apiato::call('Material@DeleteLikeAction', [\Auth::id(), request()->get('material_id')]);
            return 1;
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function deleteDislike()
    {
        try {
            \Apiato::call('Material@DeleteDislikeAction', [\Auth::id(), request()->get('material_id')]);
            return 1;
        } catch (\Exception) {
            return abort(500);
        }
    }
}
