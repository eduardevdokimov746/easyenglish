<?php

namespace App\Containers\User\Models;

use App\Containers\Auth\Models\PasswordReset;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email_users';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'is_visible',
        'is_confirmation',
        'confirmation_code'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'emails';


    protected static function newFactory()
    {
        return \App\Containers\User\Data\Factories\EmailFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'email_id', 'id');
    }
}
