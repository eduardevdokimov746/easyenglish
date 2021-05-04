<?php

namespace App\Containers\TeacherSection\Course\Models;

use App\Containers\TeacherSection\Group\Models\CourseGroup;
use App\Containers\TeacherSection\Group\Models\Group;
use App\Containers\TeacherSection\Section\Models\Section;
use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Containers\User\Models\User;
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
        'is_visible'
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

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'course_groups', 'course_id', 'group_id');
    }

    public function zadanies()
    {
        return $this->hasManyThrough(Zadanie::class, Section::class, 'course_id', 'section_id', 'id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
