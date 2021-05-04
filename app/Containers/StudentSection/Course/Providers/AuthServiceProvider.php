<?php

namespace App\Containers\StudentSection\Course\Providers;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('show-course', function(User $auth, Course $course){
            return $course->groups->pluck('id')->search($auth->group->first()->id) !== false;
        });
    }
}
