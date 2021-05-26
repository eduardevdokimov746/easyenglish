<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\EngWord;
use App\Ship\Parents\Actions\Action;

class FindWordByIdAction extends Action
{
    public function run($id)
    {
        return EngWord::where('id', $id)->with(['rusTranslate', 'sound'])->get();
    }
}
