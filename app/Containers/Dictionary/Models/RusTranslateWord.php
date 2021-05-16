<?php

namespace App\Containers\Dictionary\Models;

use App\Ship\Parents\Models\Model;

class RusTranslateWord extends Model
{
    protected $table = 'rus_translate_words';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'english_word_id',
        'translate',
        'count_add'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'dictionaries';
}
