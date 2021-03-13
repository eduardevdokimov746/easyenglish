<?php

namespace App\Containers\Auth\UI\API\Transformers;

use App\Containers\Auth\Models\Auth;
use App\Ship\Parents\Transformers\Transformer;

class AuthTransformer extends Transformer
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
     * @param Auth $entity
     *
     * @return array
     */
    public function transform(Auth $entity)
    {
        $response = [
            'object' => 'Auth',
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
