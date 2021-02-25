<?php

namespace App\Containers\Material\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MaterialRepository
 */
class MaterialRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
