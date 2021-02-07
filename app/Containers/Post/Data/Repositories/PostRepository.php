<?php

namespace App\Containers\Post\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PostRepository
 */
class PostRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
