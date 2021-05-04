<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\File;
use App\Ship\Parents\Actions\Action;

class DeleteFileAction extends Action
{
    public function run($data)
    {
        File::where('id', $data['id'])->delete();

        $fileName = $data['hash'] . '.' . $data['ext'];

        if (\FileStorage::toZadanie()->has($fileName)) {
            \FileStorage::toZadanie()->delete($fileName);
        }
    }
}
