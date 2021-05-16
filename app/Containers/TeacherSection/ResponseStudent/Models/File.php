<?php

namespace App\Containers\TeacherSection\ResponseStudent\Models;

use App\Ship\Parents\Models\Model;

class File extends Model
{
    protected $table = 'responses_students_files';

    protected $fillable = [
        'response_student_id',
        'title',
        'hash',
        'size',
        'ext'
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

    public $appends = [
        'icon'
    ];

    public function getIconAttribute()
    {
        return \FileStorage::getIconExtension($this->attributes['ext']);
    }
}
