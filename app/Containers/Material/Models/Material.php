<?php

namespace App\Containers\Material\Models;

use App\Ship\Parents\Models\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $fillable = [
        'user_id',
        'plain_title',
        'html_title',
        'plain_text',
        'html_text',
        'complexity',
        'image',
        'count_likes',
        'count_dislikes',
        'is_visible'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function likes()
    {
        return $this->hasMany(MaterialLikes::class, 'material_id', 'id');
    }

    public function dislikes()
    {
        return $this->hasMany(MaterialDislikes::class, 'material_id', 'id');
    }

    public function addUsers()
    {
        return $this->hasMany(MaterialUser::class, 'material_id', 'id');
    }
}
