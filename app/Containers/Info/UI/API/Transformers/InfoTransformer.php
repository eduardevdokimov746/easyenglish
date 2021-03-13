<?php

namespace App\Containers\Info\UI\API\Transformers;

use App\Containers\Info\Models\Info;
use App\Ship\Parents\Transformers\Transformer;

class InfoTransformer extends Transformer
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
     * @param Info $entity
     *
     * @return array
     */
    public function transform(Info $entity)
    {
        $response = [
            'object' => 'Info',
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
