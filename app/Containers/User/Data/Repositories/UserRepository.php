<?php

namespace App\Containers\User\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class UserRepository
 */
class UserRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
