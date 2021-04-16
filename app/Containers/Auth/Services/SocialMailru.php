<?php

namespace App\Containers\Auth\Services;

use App\Containers\Auth\Abstracts\SocialAuthAbstract;
use Laravel\Socialite\Contracts\User;
use Carbon\Carbon;

class SocialMailru extends SocialAuthAbstract
{
    protected $isOnlySocialite = true;

    protected function getQueryParams(User $user): array
    {
        return [
            'access_token' => $user->token,
        ];
    }

    protected function getDomain(): string
    {
        return 'https://oauth.mail.ru/userinfo?';
    }

    public function formatDataToModals(array $data): array
    {
        $userModalData = [
            'users' => [
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
            ],
            'users_info' => [
                'date_of_birth' => $data['birthday'] ? Carbon::createFromFormat('d.m.Y', $data['birthday'])->format('Y-m-d') : null,
            ],
            'email_users' => [
                'email' => $data['email'] ?? null
            ]
        ];

        return $userModalData;
    }

    protected function userToArray(User $user): array
    {
        return $user->user;
    }
}
