<?php

namespace App\Containers\Index\UI\WEB\Controllers;

use App\Containers\Index\UI\WEB\Requests\CreateIndexRequest;
use App\Containers\Index\UI\WEB\Requests\DeleteIndexRequest;
use App\Containers\Index\UI\WEB\Requests\GetAllIndicesRequest;
use App\Containers\Index\UI\WEB\Requests\FindIndexByIdRequest;
use App\Containers\Index\UI\WEB\Requests\UpdateIndexRequest;
use App\Containers\Index\UI\WEB\Requests\StoreIndexRequest;
use App\Containers\Index\UI\WEB\Requests\EditIndexRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Index\UI\WEB\Controllers
 */
class Controller extends WebController
{
    public function index()
    {

        return view('index::index');
    }
}
