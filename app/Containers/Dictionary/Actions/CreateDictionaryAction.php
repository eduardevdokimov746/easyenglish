<?php

namespace App\Containers\Dictionary\Actions;

use App\Containers\Dictionary\Models\Dictionary;
use App\Ship\Parents\Actions\Action;

class CreateDictionaryAction extends Action
{
    public function run($user_id, $eng_word_id, $rus_translate_id)
    {
        return Dictionary::create(['user_id' => $user_id, 'english_word_id' => $eng_word_id, 'rus_translate_id' => $rus_translate_id]);
    }
}
