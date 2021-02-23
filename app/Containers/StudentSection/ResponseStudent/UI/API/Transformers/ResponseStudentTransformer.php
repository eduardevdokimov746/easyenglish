<?php

namespace App\Containers\ResponseStudent\UI\API\Transformers;

use App\Containers\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Transformers\Transformer;

class ResponseStudentTransformer extends Transformer
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
     * @param ResponseStudent $entity
     *
     * @return array
     */
    public function transform(ResponseStudent $entity)
    {
        $response = [
            'object' => 'ResponseStudent',
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
