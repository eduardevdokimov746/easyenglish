<?php

namespace App\Containers\Auth\Providers;

use App\Ship\Parents\Providers\EventsProvider;

class EventServiceProvider extends EventsProvider
{
    protected $listen = [
        \App\Containers\Auth\Events\UserRegisteredEvent::class => [
            \App\Containers\Auth\Listeners\SendConfirmationEmailListener::class
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\VKontakte\VKontakteExtendSocialite@handle',
            'SocialiteProviders\Mailru\MailruExtendSocialite@handle',
        ]
    ];

    public function boot()
    {
        parent::boot();
    }

    public function register()
    {
        parent::register();
    }
}
