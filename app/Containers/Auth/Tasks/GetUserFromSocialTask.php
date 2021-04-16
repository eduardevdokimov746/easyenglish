<?php

namespace App\Containers\Auth\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Auth\Factories\SocialFactory;

class GetUserFromSocialTask extends Task
{
    public function run(string $provider)
    {
        $socialService = SocialFactory::build($provider);
        $userData = $socialService->getUserData();

        if (is_null($userData)) {
            return null;
        }

        return $socialService->formatDataToModals($userData);
    }
}
