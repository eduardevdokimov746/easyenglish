<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;

class UserTransformer extends Transformer
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
     * @param User $entity
     *
     * @return array
     */
    public function transform(User $entity)
    {
        $response = [
            'object' => 'User',
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
