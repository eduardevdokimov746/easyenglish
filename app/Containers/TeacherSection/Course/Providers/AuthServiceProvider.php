<?php

namespace App\Containers\TeacherSection\Course\Providers;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('update-course', function(User $auth, Course $course){
            return $auth->id === $course->user_id;
        });
    }
}
