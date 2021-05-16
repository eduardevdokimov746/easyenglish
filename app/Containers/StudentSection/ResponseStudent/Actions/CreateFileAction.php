<?php

namespace App\Containers\StudentSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;

class CreateFileAction extends Action
{
    public function run($response_id, $data)
    {
        $name = $data['name'];
        $hash = \FileStorage::toResponseStudent()->add($data['tmp_name'], $data['name']);
        $hash = \FileStorage::getFileName($hash);
        $ext = \FileStorage::getExtension($name);
        $size = \FileStorage::getSize($data['size']);

        $dataCreate = [
            'title' => $name,
            'hash' => $hash,
            'size' => $size,
            'ext' => $ext
        ];

        $file = ResponseStudent::where('id', $response_id)->first()->files()->create($dataCreate);

        return $file;
    }
}
