<?php

namespace App\Containers\Index\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        return view('index::index');
    }
}
