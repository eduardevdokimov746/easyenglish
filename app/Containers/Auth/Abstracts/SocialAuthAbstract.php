<?php

namespace App\Containers\Auth\Abstracts;

use App\Containers\Auth\Interfaces\ISocialAuth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User;

abstract class SocialAuthAbstract implements ISocialAuth
{
    protected $provider;
    protected $isOnlySocialite = false;

    public function __construct(string $provider)
    {
        $this->provider = $provider;
    }

    public function getUserData()
    {
        $user = $this->requestSocialite();

        if ($this->isOnlySocialite) {
            return $this->userToArray($user);
        }

        $queryString = $this->getQueryString($user);
        $userData = $this->requestUserData($queryString);
        return $this->reformUserDataHook($user, $userData);
    }

    protected function getQueryString($user)
    {
        $queryParams = $this->getQueryParams($user);
        return http_build_query($queryParams);
    }

    protected function requestSocialite(): ?User
    {
        return Socialite::driver($this->provider)->user();
    }

    protected function requestUserData(string $query)
    {
        $domain = $this->getDomain();
        return json_decode(file_get_contents($domain . $query), 1);
    }

    protected function reformUserDataHook(User $user, $userData): array
    {
        return $userData;
    }

    abstract protected function getQueryParams(User $user): array;

    abstract protected function getDomain(): string;

    protected function userToArray(User $user)
    {
        if (isset($user->user)) {
            return $user->user;
        }

        return [];
    }
}
