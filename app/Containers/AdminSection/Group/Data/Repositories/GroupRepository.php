<?php

namespace App\Containers\Group\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class GroupRepository
 */
class GroupRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
