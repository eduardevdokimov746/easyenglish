<?php

namespace App\Containers\Post\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \App\Containers\Post\Data\Factories\PostFactory::new();
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body'
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
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'posts';
}
