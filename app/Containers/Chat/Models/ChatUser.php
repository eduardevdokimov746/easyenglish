<?php

namespace App\Containers\Chat\Models;

use App\Ship\Parents\Models\Model;

class ChatUser extends Model
{
    protected $table = 'chat_users';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'chat_id',
        'count_notice'
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}
