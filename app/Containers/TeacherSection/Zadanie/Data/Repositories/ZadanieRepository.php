<?php

namespace App\Containers\Zadanie\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ZadanieRepository
 */
class ZadanieRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
