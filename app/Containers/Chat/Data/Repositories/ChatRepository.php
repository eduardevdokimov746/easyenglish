<?php

namespace App\Containers\Chat\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ChatRepository
 */
class ChatRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
