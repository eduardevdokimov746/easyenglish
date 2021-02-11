<?php

namespace App\Containers\Material\UI\API\Transformers;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Transformers\Transformer;

class MaterialTransformer extends Transformer
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
     * @param Material $entity
     *
     * @return array
     */
    public function transform(Material $entity)
    {
        $response = [
            'object' => 'Material',
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
