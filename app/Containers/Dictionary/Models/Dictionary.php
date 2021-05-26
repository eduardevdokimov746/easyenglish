<?php

namespace App\Containers\Dictionary\Models;

use App\Ship\Parents\Models\Model;

class Dictionary extends Model
{
    protected $table = 'dictionaries';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'english_word_id',
        'rus_translate_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function engWord()
    {
        return $this->belongsTo(EngWord::class, 'english_word_id', 'id');
    }

    public function rusWord()
    {
        return $this->belongsTo(RusTranslateWord::class, 'rus_translate_id', 'id');
    }
}
