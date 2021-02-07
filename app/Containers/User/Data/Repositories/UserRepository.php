<?php

namespace App\Containers\User\Data\Repositories;

use App\Containers\Post\Models\Post;
use App\Ship\Parents\Repositories\Repository;

/**
 * Class UserRepository
 */
class UserRepository extends Repository
{
    public function getAll()
    {
        return Post::paginate(4);
    }
}
