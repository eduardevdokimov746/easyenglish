<?php

namespace App\Containers\TeacherSection\Group\Models;

use App\Ship\Parents\Models\Model;

class Group extends Model
{
    protected $table = 'course_groups';

    protected $fillable = [
        'title'
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

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'groups';
}
