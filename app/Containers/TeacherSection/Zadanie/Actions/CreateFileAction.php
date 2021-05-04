<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;

class CreateFileAction extends Action
{
    public function run($zadanie_id, $data)
    {
        try{
            $name = $data['name'];
            $hash = \FileStorage::toZadanie()->add($data['tmp_name'], $data['name']);
            $hash = \FileStorage::getFileName($hash);
            $ext = \FileStorage::getExtension($name);
            $size = \FileStorage::getSize($data['size']);

            $dataCreate = [
                'title' => $name,
                'hash' => $hash,
                'size' => $size,
                'ext' => $ext
            ];

            $file = Zadanie::where('id', $zadanie_id)->first()->files()->create($dataCreate);

            return $file;
        }catch (\Exception $e){
            return false;
        }
    }
}
