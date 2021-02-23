<?php

namespace App\Containers\ResponseTeacher\UI\API\Transformers;

use App\Containers\ResponseTeacher\Models\ResponseTeacher;
use App\Ship\Parents\Transformers\Transformer;

class ResponseTeacherTransformer extends Transformer
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
     * @param ResponseTeacher $entity
     *
     * @return array
     */
    public function transform(ResponseTeacher $entity)
    {
        $response = [
            'object' => 'ResponseTeacher',
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
