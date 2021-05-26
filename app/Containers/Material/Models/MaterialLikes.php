<?php

namespace App\Containers\Material\Models;

use App\Ship\Parents\Models\Model;

class MaterialLikes extends Model
{
    protected $table = 'likes';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'material_id',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
