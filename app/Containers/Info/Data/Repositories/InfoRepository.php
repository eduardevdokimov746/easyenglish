<?php

namespace App\Containers\Info\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class InfoRepository
 */
class InfoRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
