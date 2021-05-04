<?php

namespace App\Containers\TeacherSection\Group\Models;

use App\Containers\AdminSection\Group\Models\StudentGroup;
use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\TeacherSection\Course\Models\CourseGroup;
use App\Ship\Parents\Models\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'title',
        'slug'
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

    public function students()
    {
        return $this->hasMany(StudentGroup::class, 'group_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_groups', 'group_id', 'course_id');
    }
}
