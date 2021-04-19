<?php

namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'user_id',
        'role',
        'login',
        'first_name',
        'last_name',
        'otchestvo',
        'password',
        'avatar',
        'remember_token'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public $appends = [
        'fio',
        'roleLang'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static function newFactory()
    {
        return \App\Containers\User\Data\Factories\UserFactory::new();
    }

    public function email()
    {
        return $this->hasOne(Email::class, 'user_id', 'id');
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(\App\Containers\TeacherSection\Course\Models\Course::class, 'user_id', 'id');
    }

    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
        $this->save();
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function getRememberTokenName()
    {
        if (property_exists($this, 'rememberTokenName')) {
            return $this->rememberTokenName;
        } else {
            return 'remember_token';
        }
    }

    public function getFioAttribute($value)
    {
        $fio = isset($this->attributes['last_name']) ? $this->attributes['last_name'] : '';
        $fio .= isset($this->attributes['first_name']) ? ' ' . $this->attributes['first_name'] : '';
        $fio .= isset($this->attributes['otchestvo']) ? ' ' . $this->attributes['otchestvo'] : '';

        return $fio;
    }

    public function getRoleLangAttribute()
    {
        switch ($this->attributes['role']) {
            case('admin'): return 'Администратор';
            case('teacher'): return 'Преподаватель';
            case('student'): return 'Студент';
            case('simple'): return 'Пользователь';

        }
    }
}
