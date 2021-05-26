<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\RusTranslateWord;
use App\Ship\Parents\Actions\Action;

class DeleteTranslateWordAction extends Action
{
    public function run($id)
    {
        return RusTranslateWord::where('id', $id)->delete();
    }
}
