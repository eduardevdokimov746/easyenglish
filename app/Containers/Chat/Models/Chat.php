<?php

namespace App\Containers\Chat\Models;

use App\Ship\Parents\Models\Model;

class Chat extends Model
{
    protected $table = 'chats';
    public $timestamps = false;

    protected $fillable = [
        'type',
        'title',
        'hash'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function users()
    {
        return $this->hasMany(ChatUser::class, 'chat_id', 'id');
    }
}
