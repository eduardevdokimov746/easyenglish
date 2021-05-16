<?php

namespace App\Containers\Dictionary\Models;

use App\Ship\Parents\Models\Model;

class DictionaryWordStatus extends Model
{
    protected $table = 'dictionary_word_status';
    public $timestamps = false;

    protected $fillable = [
        'dictionary_id',
        'status',
        'slovo_perevod',
        'perevod_slovo',
        'construct_words'
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
