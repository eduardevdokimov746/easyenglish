<?php

namespace App\Containers\User1\UI\API\Transformers;

use App\Containers\User1\Models\User1;
use App\Ship\Parents\Transformers\Transformer;

class User1Transformer extends Transformer
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
     * @param User1 $entity
     *
     * @return array
     */
    public function transform(User1 $entity)
    {
        $response = [
            'object' => 'User1',
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
