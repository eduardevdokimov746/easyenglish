<?php

namespace App\Containers\Index\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class IndexRepository
 */
class IndexRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
