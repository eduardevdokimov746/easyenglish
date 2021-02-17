<?php

namespace App\Containers\Course\UI\API\Transformers;

use App\Containers\Course\Models\Course;
use App\Ship\Parents\Transformers\Transformer;

class CourseTransformer extends Transformer
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
     * @param Course $entity
     *
     * @return array
     */
    public function transform(Course $entity)
    {
        $response = [
            'object' => 'Course',
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
