<?php

namespace App\Containers\Group\UI\API\Transformers;

use App\Containers\Group\Models\Group;
use App\Ship\Parents\Transformers\Transformer;

class GroupTransformer extends Transformer
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
     * @param Group $entity
     *
     * @return array
     */
    public function transform(Group $entity)
    {
        $response = [
            'object' => 'Group',
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
