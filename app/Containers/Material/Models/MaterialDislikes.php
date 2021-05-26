<?php

namespace App\Containers\Material\Models;

use App\Ship\Parents\Models\Model;

class MaterialDislikes extends Model
{
    protected $table = 'dislikes';
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

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'materials';
}
