<?php

namespace App\Containers\Section\UI\API\Transformers;

use App\Containers\Section\Models\Section;
use App\Ship\Parents\Transformers\Transformer;

class SectionTransformer extends Transformer
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
     * @param Section $entity
     *
     * @return array
     */
    public function transform(Section $entity)
    {
        $response = [
            'object' => 'Section',
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
