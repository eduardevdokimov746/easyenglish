<?php

namespace App\Containers\Chat\Providers;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('chat', function(User $auth){
            return $auth->role === 'teacher' || $auth->role === 'student';
        });
    }
}
