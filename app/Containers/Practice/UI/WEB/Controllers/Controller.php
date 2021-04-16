<?php

namespace App\Containers\Practice\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        return view('practice::index');
    }

    public function slovoPerevod()
    {
        return view('practice::slovo_perevod');
    }

    public function perevodSlovo()
    {
        return view('practice::perevod_slovo');
    }

    public function constructor()
    {
        return view('practice::constructor');
    }

    public function povtor()
    {
        return view('practice::result_page');
        //return view('practice::povtor');
    }
}
