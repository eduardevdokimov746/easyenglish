<?php

namespace App\Containers\TeacherSection\Course\Models;

use App\Ship\Parents\Models\Model;

class CourseGroup extends Model
{
    protected $table = 'course_groups';

    protected $fillable = [
        'course_id',
        'group_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public $timestamps = false;

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'groups';
}
