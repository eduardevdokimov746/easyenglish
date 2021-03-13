<?php

namespace App\Containers\Auth1\UI\API\Transformers;

use App\Containers\Auth1\Models\Auth1;
use App\Ship\Parents\Transformers\Transformer;

class Auth1Transformer extends Transformer
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
     * @param Auth1 $entity
     *
     * @return array
     */
    public function transform(Auth1 $entity)
    {
        $response = [
            'object' => 'Auth1',
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
