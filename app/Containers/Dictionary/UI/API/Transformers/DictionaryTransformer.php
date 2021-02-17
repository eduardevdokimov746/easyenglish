<?php

namespace App\Containers\Dictionary\UI\API\Transformers;

use App\Containers\Dictionary\Models\Dictionary;
use App\Ship\Parents\Transformers\Transformer;

class DictionaryTransformer extends Transformer
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
     * @param Dictionary $entity
     *
     * @return array
     */
    public function transform(Dictionary $entity)
    {
        $response = [
            'object' => 'Dictionary',
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
