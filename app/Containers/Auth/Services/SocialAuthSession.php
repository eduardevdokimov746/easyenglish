<?php

namespace App\Containers\Auth\Services;

class SocialAuthSession
{
    protected $sessionName = 'social-auth';

    public function hasSession(): bool
    {
        return session()->has($this->sessionName);
    }

    public function setUser(array $data): void
    {
        session()->put($this->sessionName, $data);
    }

    public function getUser(): ?array
    {
        if ($this->hasSession()) {
            return session($this->sessionName);
        }

        return null;
    }

    public function getParam(string $param): string
    {
        if ($this->hasSession()) {
            switch ($param) {
                case('login'):
                    $key = 'users';
                    break;
                case('email'):
                    $key = 'email_users';
                    break;
                default: return '';
            }

            $user = $this->getUser();

            if (isset($user[$key][$param])) {
                return $user[$key][$param];
            }

            return '';
        }
        return '';
    }

    public function getTableData(string $tableName): ?array
    {
        if ($this->hasSession()) {
            $user = $this->getUser();

            if (isset($user[$tableName])) {
                return $user[$tableName];
            }
        }

        return null;
    }

    public function deleteUser(): void
    {
        session()->pull($this->sessionName);
    }
}
