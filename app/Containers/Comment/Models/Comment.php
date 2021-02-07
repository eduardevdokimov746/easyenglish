<?php

namespace App\Containers\Comment\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \App\Containers\Comment\Data\Factories\CommentFactory::new();
    }

    protected $fillable = [

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
    protected $resourceKey = 'comments';
}
