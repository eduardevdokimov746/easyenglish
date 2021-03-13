<?php

namespace App\Containers\Index\UI\API\Transformers;

use App\Containers\Index\Models\Index;
use App\Ship\Parents\Transformers\Transformer;

class IndexTransformer extends Transformer
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
     * @param Index $entity
     *
     * @return array
     */
    public function transform(Index $entity)
    {
        $response = [
            'object' => 'Index',
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
