<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\File;
use App\Ship\Parents\Actions\Action;

class DeleteFileAction extends Action
{
    public function run($data)
    {
        File::where('id', $data['id'])->delete();

        $fileName = $data['hash'] . '.' . $data['ext'];

        if (\FileStorage::toSection()->has($fileName)) {
            \FileStorage::toSection()->delete($fileName);
        }
    }
}
