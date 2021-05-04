<?php

namespace App\Containers\TeacherSection\Zadanie\Providers;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Containers\User\Models\User;
use App\Ship\Parents\Providers\AuthProvider;

class AuthServiceProvider extends AuthProvider
{
    public function boot()
    {
        parent::boot();

        \Gate::define('update-zadanie', function(User $auth, Zadanie $zadanie){
            return $auth->id === $zadanie->user_id;
        });
    }
}
