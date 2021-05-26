<?php

namespace App\Containers\TeacherSection\Material\Providers;

use App\Containers\Material\Models\Material;
use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('update-material', function(User $auth, Material $material){
            return $auth->id === $material->user_id;
        });
    }
}
