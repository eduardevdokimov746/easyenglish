<?php

namespace App\Containers\TeacherSection\ResponseStudent\Models;

use App\Containers\TeacherSection\ResponseTeacher\Models\ResponseTeacher;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class ResponseStudent extends Model
{
    protected $table = 'responses_students';

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
    protected $resourceKey = 'responsestudents';

    public function responseTeacher()
    {
        return $this->hasOne(ResponseTeacher::class, 'response_student_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
