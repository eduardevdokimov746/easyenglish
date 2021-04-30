<?php

namespace App\Containers\AdminSection\Group\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class StudentGroup extends Model
{
    protected $table = 'students_group';

    protected $fillable = [
        'user_id',
        'group_id'
    ];

    public $timestamps = false;

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'groups';

    public function student()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
