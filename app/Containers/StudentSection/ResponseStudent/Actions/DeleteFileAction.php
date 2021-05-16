<?php

namespace App\Containers\StudentSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\File;
use App\Ship\Parents\Actions\Action;

class DeleteFileAction extends Action
{
    public function run($data)
    {
        File::where('id', $data['id'])->delete();

        $fileName = $data['hash'] . '.' . $data['ext'];

        if (\FileStorage::toResponseStudent()->has($fileName)) {
            \FileStorage::toResponseStudent()->delete($fileName);
        }
    }
}
