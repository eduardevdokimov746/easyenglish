<?php

namespace App\Containers\Auth\Factories;

use App\Containers\Auth\Interfaces\ISocialAuth;

class SocialFactory
{
    public static function build(string $provider): ISocialAuth
    {
        switch ($provider) {
            case('vkontakte'):
                return new \App\Containers\Auth\Services\SocialVkontakte($provider);
            case('mailru'):
                return new \App\Containers\Auth\Services\SocialMailru($provider);
        }
    }
}
