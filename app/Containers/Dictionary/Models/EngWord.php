<?php

namespace App\Containers\Dictionary\Models;

use App\Containers\Dictionary\Models\RusTranslateWord;
use App\Ship\Parents\Models\Model;

class EngWord extends Model
{
    protected $table = 'english_words';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'word',
        'image'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public static function findOrCreate($word, $data)
    {
        $word = EngWord::where('word', $word)->get()->first();

        return $word ?: EngWord::create($data);
    }

    public function rusTranslate()
    {
        return $this->hasMany(RusTranslateWord::class, 'english_word_id', 'id');
    }

    public function sound()
    {
        return $this->hasOne(EngWordSound::class, 'english_word_id', 'id');
    }
}
