<?php

namespace App\Containers\Info\UI\WEB\Controllers;

use App\Containers\Info\UI\WEB\Requests\CreateInfoRequest;
use App\Containers\Info\UI\WEB\Requests\DeleteInfoRequest;
use App\Containers\Info\UI\WEB\Requests\GetAllInfosRequest;
use App\Containers\Info\UI\WEB\Requests\FindInfoByIdRequest;
use App\Containers\Info\UI\WEB\Requests\UpdateInfoRequest;
use App\Containers\Info\UI\WEB\Requests\StoreInfoRequest;
use App\Containers\Info\UI\WEB\Requests\EditInfoRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Info\UI\WEB\Controllers
 */
class Controller extends WebController
{
    public function info()
    {
        return view('info::info');
    }

    public function faq()
    {
        return view('info::faq');
    }
}
