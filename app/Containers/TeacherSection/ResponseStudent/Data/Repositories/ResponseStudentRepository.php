<?php

namespace App\Containers\ResponseStudent\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ResponseStudentRepository
 */
class ResponseStudentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
