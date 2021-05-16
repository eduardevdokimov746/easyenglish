<?php

namespace App\Containers\Dictionary\Models;

use App\Ship\Parents\Models\Model;

class EngWordSound extends Model
{
    protected $table = 'english_word_sounds';
    public $timestamps = false;

    protected $fillable = [
        'english_word_id',
        'normal',
        'slow'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
