<?php

namespace App\Containers\Index1\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class Index1Repository
 */
class Index1Repository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
