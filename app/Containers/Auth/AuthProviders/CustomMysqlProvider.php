<?php

namespace App\Containers\Auth\AuthProviders;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Containers\User\Models\User;
use App\Containers\Auth\Traits\AuthenticableDataFromSession;

class CustomMysqlProvider implements UserProvider
{
    use AuthenticableDataFromSession;

    public function retrieveById($identifier)
    {
        $user = User::where('login', $identifier)->with('email')->first();

        if (is_null($user)) {
            return null;
        }

        return $user;
    }

    public function retrieveByToken($identifier, $token)
    {
        return User::where('remember_token', $token)->first();
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        $user->setRememberToken($token);
        $this->setCookieRememberToken($token);
    }

    public function setCookieRememberToken($token)
    {
        \Cookie::queue('remember_token', $token, 10080 * 8, '/');
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (isset($credentials['login'])) {
            return $this->retrieveById($credentials['login']);
        }

        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        if (isset($credentials['password'])) {
            return \Hash::check($credentials['password'], $user->password);
        }

        return false;
    }

    public function updateDataUser(Authenticatable $user)
    {
        $user = $this->retrieveById($user->login);
        $this->putSession($user);
    }
}
