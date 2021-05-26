<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\Dictionary;
use App\Ship\Parents\Actions\Action;

class GetUserDictionaryAction extends Action
{
    public function run($user_id)
    {
        return Dictionary::where('user_id', $user_id)->with(['engWord', 'rusWord'])->get();
    }
}
