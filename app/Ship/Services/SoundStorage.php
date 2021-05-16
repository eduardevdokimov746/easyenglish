<?php

namespace App\Ship\Services;

class SoundStorage
{
    private $storagePath = 'sounds/';

    public function add($data)
    {
        $filePath = $this->storagePath . md5(microtime()) . '.mp3';

        \Storage::put($filePath, $data);

        return $filePath;
    }


}
