<?php

namespace App\Containers\TeacherSection\Section\Providers;

use App\Containers\TeacherSection\Section\Models\Section;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('update-section', function(User $auth, Section $section){
            return $auth->id === $section->course->user_id;
        });
    }
}
