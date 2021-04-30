<?php

namespace App\Containers\AdminSection\Auth\Guards;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\UserProvider;

class AdminGuard implements StatefulGuard
{
    protected $user = null;
    protected $auth = false;
    protected $provider;
    protected $isRemember = false;

    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
        $this->init();
    }

    protected function init()
    {
        if ($user = $this->provider->getUserFromSession()) {
            $this->isRemember = $this->provider->hasRememberToken();
            $this->setUser($user);
        } elseif ($user = $this->getUserByToken()) {
            $this->provider->putSession($user);
            $this->isRemember = true;
            $this->setUser($user);
        }
    }

    public function check()
    {
        return $this->auth;
    }

    public function guest()
    {
        return !$this->check();
    }

    public function user()
    {
        if ($this->check()) {
            return $this->user;
        }
        return null;
    }

    public function id()
    {
        if ($this->check()) {
            return $this->user->id;
        }
        return null;
    }

    public function validate(array $credentials = [])
    {
        $issetCredentials = (isset($credentials['login']) && isset($credentials['password']));

        if ($issetCredentials && ($user = $this->provider->retrieveByCredentials($credentials))) {
            return $this->provider->validateCredentials($user, $credentials);
        }

        return false;
    }

    public function setUser(Authenticatable $user)
    {
        $this->auth = true;
        $this->user = $user;
    }

    public function attempt(array $credentials = [], $remember = false)
    {
        if (!$this->validate($credentials)) {
            return false;
        }

        if (!$user = $this->provider->retrieveByCredentials($credentials)) {
            return false;
        }

        if ($remember) {
            $this->isRemember = true;
            $token = md5($user->password);
            $this->provider->updateRememberToken($user, $token);
        }

        $this->setUser($user);
        $this->provider->putSession($user);

        return true;
    }

    public function once(array $credentials = [])
    {
        if ($this->validate($credentials)
            && ($user = $this->provider->retrieveByCredentials($credentials))) {
            $this->setUser($user);
            return true;
        }

        return false;
    }

    public function login(Authenticatable $user, $remember = false)
    {
        if ($remember) {
            $this->isRemember = true;
            $token = md5($user->password);
            $this->provider->updateRememberToken($user, $token);
        }

        $this->setUser($user);
        $this->provider->putSession($user);
    }

    public function loginUsingId($id, $remember = false)
    {
        if ($user = $this->provider->retrieveById($id)) {
            $this->login($user, $remember);
            return $this->user;
        }

        return null;
    }

    public function onceUsingId($id)
    {
        if ($user = $this->provider->retrieveById($id)) {
            $this->setUser($user);
            return $this->user;
        }

        return false;
    }

    public function viaRemember()
    {
        return $this->isRemember;
    }

    public function logout()
    {
        $this->provider->deleteCookieRememberToken($this->user);
        $this->provider->deleteSession();
    }

    protected function getUserByToken()
    {
        if (request()->hasCookie('remember_token')) {
            $token = request()->cookie('remember_token');
            return $this->provider->retrieveByToken(null, $token);
        }
        return null;
    }

    public function updateDataUser(): void
    {
        if ($this->auth) {
            $this->provider->updateDataUser($this->user);
        }
    }

    public function checkPassword(string $password): bool
    {
        return \Hash::check($password, $this->user->password);
    }
}
