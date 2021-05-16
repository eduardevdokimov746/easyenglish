<?php

namespace App\Containers\TeacherSection\Zadanie\Models;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Containers\TeacherSection\Section\Models\Section;
use App\Ship\Parents\Models\Model;

class Zadanie extends Model
{
    protected $table = 'zadanies';

    protected $fillable = [
        'title',
        'user_id',
        'section_id',
        'type',
        'description',
        'is_visible',
        'deadline'
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
        'deadline'
    ];

    protected $appends = [
        'show_updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'zadanies';

    public function responseStudents()
    {
        return $this->hasMany(ResponseStudent::class, 'zadanie_id', 'id');
    }

    public function getShowTypeAttribute()
    {
        return $this->attributes['type'] == 'testing' ? 'Тест' : 'Обычное';
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function links()
    {
        return $this->hasMany(Link::class, 'zadanie_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'zadanie_id', 'id');
    }
}
