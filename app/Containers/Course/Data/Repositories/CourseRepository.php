<?php

namespace App\Containers\Course\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CourseRepository
 */
class CourseRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
