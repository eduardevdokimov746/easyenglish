<?php

namespace App\Containers\Dictionary\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DictionaryRepository
 */
class DictionaryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
