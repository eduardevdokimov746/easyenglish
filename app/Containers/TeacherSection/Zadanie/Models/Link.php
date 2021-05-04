<?php

namespace App\Containers\TeacherSection\Zadanie\Models;

use App\Ship\Parents\Models\Model;

class Link extends Model
{
    protected $table = 'zadanie_links';

    protected $fillable = [
        'section_id',
        'title',
        'url'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [
        'type',
        'edit_url'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getTypeAttribute()
    {
        preg_match("#^(?<protocol>https?://)#", $this->attributes['url'], $m);
        return $m['protocol'];
    }

    public function getEditUrlAttribute()
    {
        return preg_filter("#^(?<protocol>https?://)#", '', $this->attributes['url']);
    }
}
