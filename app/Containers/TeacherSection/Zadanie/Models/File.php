<?php

namespace App\Containers\TeacherSection\Zadanie\Models;

use App\Ship\Parents\Models\Model;

class File extends Model
{
    protected $table = 'zadanie_files';

    protected $fillable = [
        'section_id',
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
