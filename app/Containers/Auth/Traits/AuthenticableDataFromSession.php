<?php

namespace App\Containers\Auth\Traits;

use Illuminate\Contracts\Auth\Authenticatable;

trait AuthenticableDataFromSession
{
    protected $sessionName = 'authenticate-user';

    /**
     * Get data user from session
     *
     * @return Authenticatable|null
     */
    public function getUserFromSession(): ?Authenticatable
    {
        if ($this->hasSession()) {
            $user = session()->get($this->sessionName);
            return $user;
        }

        return null;
    }

    /**
     * Check isset session file
     *
     * @return bool
     */
    protected function hasSession(): bool
    {
        return session()->has($this->sessionName);
    }

    public function putSession(Authenticatable $user): void
    {
        if ($this->hasSession()) {
            $this->deleteSession();
        }
        session()->put($this->sessionName, $user);
    }

    public function deleteSession(): void
    {
        session()->forget($this->sessionName);
    }

    public function deleteCookieRememberToken(Authenticatable $user): void
    {
        $user->setRememberToken(null);
        $deleteCookie = \Cookie::forget('remember_token');
        \Cookie::queue($deleteCookie);
    }
}
