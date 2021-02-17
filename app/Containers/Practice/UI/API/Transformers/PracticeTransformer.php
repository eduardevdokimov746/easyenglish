<?php

namespace App\Containers\Practice\UI\API\Transformers;

use App\Containers\Practice\Models\Practice;
use App\Ship\Parents\Transformers\Transformer;

class PracticeTransformer extends Transformer
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
     * @param Practice $entity
     *
     * @return array
     */
    public function transform(Practice $entity)
    {
        $response = [
            'object' => 'Practice',
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
