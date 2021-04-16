<?php

namespace App\Containers\TeacherSection\Course\Models;

use App\Ship\Parents\Models\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'user_id',
        'title',
        'characteristic',
        'little_description',
        'target',
        'list_literature',
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
    protected $resourceKey = 'courses';

    public function sections()
    {
        return $this->hasMany(\App\Containers\TeacherSection\Section\Models\Section::class, 'course_id', 'id');
    }
}
