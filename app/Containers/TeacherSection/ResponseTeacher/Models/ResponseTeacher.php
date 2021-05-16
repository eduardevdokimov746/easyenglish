<?php

namespace App\Containers\TeacherSection\ResponseTeacher\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class ResponseTeacher extends Model
{
    protected $table = 'responses_teachers';

    protected $fillable = [
        'user_id',
        'comment',
        'is_credited',
        'result',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
