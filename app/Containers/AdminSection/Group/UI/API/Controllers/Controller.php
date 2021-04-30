<?php

namespace App\Containers\AdminSection\Group\UI\API\Controllers;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function search()
    {
        $groups = \Apiato::call('AdminSection\Group@GetAllGroupsFromTitleAction', [request()->get('query')]);

        return $this->json($groups);
    }

    public function checkUniqueTitle()
    {
        return Group::where('title', request()->get('query'))->exists();
    }
}
