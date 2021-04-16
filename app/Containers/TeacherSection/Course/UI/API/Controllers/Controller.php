<?php

namespace App\Containers\TeacherSection\Course\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function uploadFile()
    {
        if (!empty($_FILES) && !empty($_FILES['file'])) {
            $ext = \FileStorage::getExtension($_FILES['file']['name']);

            $icon = \FileStorage::getIconExtension($ext);

            $tmp = \FileStorage::add($_FILES['file']['tmp_name'], $ext);

            $fileSize = \FileStorage::getSize($_FILES['file']['size']);
            
            if ($tmp) {
                return $this->json([
                    'icon' => $icon,
                    'name' => $_FILES['file']['name'],
                    'size' => $fileSize,
                    'tmp' => $tmp
                ]);
            }
        }

        return abort(500);
    }

    public function deleteFile()
    {
        $filePath = request()->get('file', null);

        if (!is_null($filePath) && \FileStorage::has($filePath)) {
            if (\FileStorage::delete($filePath)) {
                return $this->json([
                    'status' => 'success'
                ]);
            }
        }

        return abort(500);
    }
}
