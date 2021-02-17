<?php

namespace App\Containers\Practice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PracticeRepository
 */
class PracticeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
