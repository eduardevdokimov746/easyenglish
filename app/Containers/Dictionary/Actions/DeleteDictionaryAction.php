<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\Dictionary;
use App\Ship\Parents\Actions\Action;

class DeleteDictionaryAction extends Action
{
    public function run($user_id, $eng_word_id, $rus_translate_id)
    {
        return Dictionary::where('user_id', $user_id)
            ->where('english_word_id', $eng_word_id)
            ->where('rus_translate_id', $rus_translate_id)
            ->delete();
    }
}
