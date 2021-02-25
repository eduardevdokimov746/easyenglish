<?php

namespace App\Containers\Zadanie\UI\API\Transformers;

use App\Containers\Zadanie\Models\Zadanie;
use App\Ship\Parents\Transformers\Transformer;

class ZadanieTransformer extends Transformer
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
     * @param Zadanie $entity
     *
     * @return array
     */
    public function transform(Zadanie $entity)
    {
        $response = [
            'object' => 'Zadanie',
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
