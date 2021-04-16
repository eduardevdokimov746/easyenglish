<?php

namespace App\Containers\Auth\Interfaces;

interface ISocialAuth
{
    public function getUserData();

    public function formatDataToModals(array $data): array;
}
