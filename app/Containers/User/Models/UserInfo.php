<?php

namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'users_info';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'is_visible_date_of_birth',
        'city',
        'country',
        'number_phone',
        'description'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [
        'dbirth'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    protected static function newFactory()
    {
        return \App\Containers\User\Data\Factories\UserInfoFactory::new();
    }

    public function getDbirthAttribute()
    {
        if (
            $this->attributes['is_visible_date_of_birth'] &&
            !empty($this->attributes['date_of_birth'])
        ) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['date_of_birth'])->format('d.m.Y');
        }

        return null;
    }
}
