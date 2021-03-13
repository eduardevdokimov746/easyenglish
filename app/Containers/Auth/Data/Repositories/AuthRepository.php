<?php

namespace App\Containers\Auth\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AuthRepository
 */
class AuthRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
