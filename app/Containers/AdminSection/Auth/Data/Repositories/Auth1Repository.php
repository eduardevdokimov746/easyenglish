<?php

namespace App\Containers\Auth1\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class Auth1Repository
 */
class Auth1Repository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
