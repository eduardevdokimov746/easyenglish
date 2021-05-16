<?php

namespace App\Containers\StudentSection\ResponseStudent\Providers;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('update-response-student', function(User $auth, ResponseStudent $responseStudent){
            return $auth->id === $responseStudent->user_id;
        });
    }
}
