<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\AuthProvider as AbstractAuthProvider;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Gate;

/**
 * Class ShipAuthServiceProvider
 *
 * This class is provided by Laravel as default provider,
 * to register authorization policies.
 *
 * A.K.A App\Providers\AuthServiceProvider.php
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthProvider extends AbstractAuthProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

}
