<?php

namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'users_info';
    public $timestamps = false;

    protected $fillable = [

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    protected static function newFactory()
    {
        return \App\Containers\User\Data\Factories\UserInfoFactory::new();
    }
}
