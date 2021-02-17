<?php

namespace App\Containers\Teacher\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TeacherRepository
 */
class TeacherRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
