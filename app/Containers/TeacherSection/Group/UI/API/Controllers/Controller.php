<?php

namespace App\Containers\TeacherSection\Group\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function search(){
        $groups = \Apiato::call('AdminSection\Group@GetAllGroupsFromTitleAction', [request()->get('query')]);

        return $this->json($groups);
    }
}
