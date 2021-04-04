<?php

namespace App\Containers\Index1\UI\API\Transformers;

use App\Containers\Index1\Models\Index1;
use App\Ship\Parents\Transformers\Transformer;

class Index1Transformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Index1 $entity
     *
     * @return array
     */
    public function transform(Index1 $entity)
    {
        $response = [
            'object' => 'Index1',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
