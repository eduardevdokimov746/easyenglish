<?php

namespace App\Containers\Auth\Models;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Models\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    public $timestamps = false;

    protected $fillable = [
        'email_id',
        'token',
        'created_at'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
    ];

    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id', 'id');
    }
}
