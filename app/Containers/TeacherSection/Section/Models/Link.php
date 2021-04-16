<?php

namespace App\Containers\TeacherSection\Section\Models;

use App\Ship\Parents\Models\Model;

class Link extends Model
{
    protected $table = 'section_links';

    protected $fillable = [
        'section_id',
        'title',
        'url'
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
    protected $resourceKey = 'sections';
}