<?php

namespace App\Containers\Material\Models;

use App\Ship\Parents\Models\Model;

class MaterialUser extends Model
{
    protected $table = 'user_materials';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'material_id',
        'status'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];
}
