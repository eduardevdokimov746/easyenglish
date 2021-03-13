<?php

namespace App\Containers\User1\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class User1Repository
 */
class User1Repository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
