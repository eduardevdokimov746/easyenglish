<?php

namespace App\Containers\Chat\UI\API\Transformers;

use App\Containers\Chat\Models\Chat;
use App\Ship\Parents\Transformers\Transformer;

class ChatTransformer extends Transformer
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
     * @param Chat $entity
     *
     * @return array
     */
    public function transform(Chat $entity)
    {
        $response = [
            'object' => 'Chat',
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
