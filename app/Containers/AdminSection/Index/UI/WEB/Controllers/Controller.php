<?php

namespace App\Containers\AdminSection\Index\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        $simpleCount = \Apiato::call('AdminSection\User@GetCountUsersWithRoleAction', ['simple']);
        $studentCount = \Apiato::call('AdminSection\User@GetCountUsersWithRoleAction', ['student']);
        $teacherCount = \Apiato::call('AdminSection\User@GetCountUsersWithRoleAction', ['teacher']);
        $adminCount = \Apiato::call('AdminSection\User@GetCountUsersWithRoleAction', ['admin']);

        return view('adminsection/index::index', compact('simpleCount', 'studentCount', 'teacherCount', 'adminCount'));
    }
}
