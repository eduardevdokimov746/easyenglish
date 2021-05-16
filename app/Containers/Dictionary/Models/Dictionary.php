<?php

namespace App\Containers\Dictionary\Models;

use App\Ship\Parents\Models\Model;

class Dictionary extends Model
{
    protected $table = 'dictionaries';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'english_word_id',
        'rus_translate_id'
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
