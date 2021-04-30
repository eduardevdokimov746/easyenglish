<?php

namespace App\Containers\TeacherSection\ResponseTeacher\Models;

use App\Ship\Parents\Models\Model;

class ResponseTeacher extends Model
{
    protected $table = 'responses_teachers';

    protected $fillable = [
        'updated_at'
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
    protected $resourceKey = 'responseteachers';
}
