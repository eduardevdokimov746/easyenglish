<?php

namespace App\Containers\ResponseTeacher\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ResponseTeacherRepository
 */
class ResponseTeacherRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
