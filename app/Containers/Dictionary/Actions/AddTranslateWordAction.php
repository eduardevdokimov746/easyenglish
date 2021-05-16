<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\RusTranslateWord;
use App\Ship\Parents\Actions\Action;

class AddTranslateWordAction extends Action
{
    public function run($data)
    {
        return RusTranslateWord::create($data);
    }
}
