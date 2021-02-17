<?php

namespace App\Containers\Teacher\UI\API\Transformers;

use App\Containers\Teacher\Models\Teacher;
use App\Ship\Parents\Transformers\Transformer;

class TeacherTransformer extends Transformer
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
     * @param Teacher $entity
     *
     * @return array
     */
    public function transform(Teacher $entity)
    {
        $response = [
            'object' => 'Teacher',
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
