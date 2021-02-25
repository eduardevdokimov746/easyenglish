<?php

namespace App\Containers\Section\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SectionRepository
 */
class SectionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
