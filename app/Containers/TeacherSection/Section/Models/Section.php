<?php

namespace App\Containers\TeacherSection\Section\Models;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Models\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'course_id',
        'title',
        'description',
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

    public function links()
    {
        return $this->hasMany(Link::class, 'section_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'section_id', 'id');
    }

    public function zadanies()
    {
        return $this->hasMany(Zadanie::class, 'section_id', 'id');
    }
}
