<?php

namespace App\Containers\Chat\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class FindUsersFromQueryAction extends Action
{
    public function run($queryStr)
    {
        return User::select(['first_name', 'last_name', 'otchestvo', 'login', 'id', 'avatar', 'role'])
            ->whereRaw('(CONCAT(COALESCE(last_name, \'\'), \' \', COALESCE(first_name,\'\'), \' \', COALESCE(otchestvo,\'\')) like \'%' . $queryStr .'%\' OR login like \'%'.$queryStr.'%\') AND (role = \'teacher\' OR role = \'student\') AND id != ' . \Auth::id())
            ->get()
            ->toArray();
    }
}
