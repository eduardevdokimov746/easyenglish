<?php

namespace App\Containers\Auth\Services;

use App\Containers\Auth\Abstracts\SocialAuthAbstract;
use Carbon\Carbon;
use Laravel\Socialite\Contracts\User;

class SocialVkontakte extends SocialAuthAbstract
{
    protected function getQueryParams(User $user): array
    {
        return [
            'lang' => 'ru',
            'v' => '5.52',
            'access_token' => $user->token,
            'user_id' => $user->id,
            'fields' => [
                'first_name',
                'photo_400_orig',
                'photo_50',
                'bdate',
                'city',
                'country',
                'screen_name',
                'has_photo',
            ],
        ];
    }

    protected function getDomain(): string
    {
        return 'https://api.vk.com/method/users.get?';
    }

    protected function requestUserData(string $query)
    {
        $data = parent::requestUserData($query);

        if (isset($data['response'][0])) {
            return $data['response'][0];
        }

        return null;
    }

    protected function saveAvatar(array $data)
    {
        if ($data['has_photo']) {
            $image = file_get_contents($data['photo_400_orig']);
            $imageName = md5($data['id']) . '.jpg';

            \PhotoStorage::addProfileAvatar($imageName, $image);

            $image = file_get_contents($data['photo_50']);

            \PhotoStorage::addChatAvatar($imageName, $image);
            return $imageName;
        } else {
            return null;
        }
    }

    public function formatDataToModals(array $data): array
    {
        $imageName = $this->saveAvatar($data);

        $userModalData = [
            'users' => [
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'login' => $data['screen_name'] ?? null,
                'avatar' => $imageName
            ],
            'users_info' => [
                'date_of_birth' => $data['bdate'] ? Carbon::createFromFormat('d.m.Y', $data['bdate'])->format('Y-m-d') : null,
                'city' => $data['city'] ?? null,
                'country' => $data['country'] ?? null,
            ],
            'email_users' => [
                'email' => $data['email'] ?? null
            ]
        ];

        return $userModalData;
    }

    protected function reformUserDataHook(User $user, $userData): array
    {
        $userData['email'] = $user->getEmail();
        return $userData;
    }
}
