<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Section\Models\Section;

class CreateFileAction extends Action
{
    public function run($section_id, $data)
    {
        try{
            $name = $data['name'];
            $hash = \FileStorage::toSection()->add($data['tmp_name'], $data['name']);
            $hash = \FileStorage::getFileName($hash);
            $ext = \FileStorage::getExtension($name);
            $size = \FileStorage::getSize($data['size']);

            $dataCreate = [
                'title' => $name,
                'hash' => $hash,
                'size' => $size,
                'ext' => $ext
            ];

            $file = Section::where('id', $section_id)->first()->files()->create($dataCreate);

            return $file;
        }catch (\Exception $e){
            return false;
        }
    }
}
