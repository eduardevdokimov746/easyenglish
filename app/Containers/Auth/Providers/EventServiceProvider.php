<?php

namespace App\Containers\Auth\Providers;

use App\Ship\Parents\Providers\EventsProvider;
use App\Containers\Auth\Guards\CustomGuard;
use App\Containers\Auth\AuthProviders\CustomMysqlProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class EventServiceProvider extends EventsProvider
{
    protected $listen = [
        \App\Containers\Auth\Events\UserRegisteredEvent::class => [
            \App\Containers\Auth\Listeners\SendConfirmationEmailListener::class
        ]
    ];


    public function boot()
    {
        parent::boot();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();
    }
}
