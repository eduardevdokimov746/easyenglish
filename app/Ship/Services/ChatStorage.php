<?php

namespace App\Ship\Services;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Collection;

class ChatStorage
{
    protected $storagePath = 'chats/';
    protected $disk = 'local';

    public function create($data = '')
    {
        $hash = md5(mt_rand(1000, 9999) . microtime());

        $fileName = $this->getFileName($hash);

        $this->setDisk()->put($this->storagePath. $fileName, $data);

        return $hash;
    }

    public function writeByHash($hash, $data): void
    {
        if ($this->has($hash)) {
            $this->setDisk()->put($this->storagePath . $this->getFileName($hash), json_encode($data));
        }
    }

    public function get($hash): ?array
    {
        if ($this->has($hash)) {

            $files = $this->getAllFiles();
            $filesCollect = $this->getBasePathFiles($files);
            $keyFile = $filesCollect->search($this->getFileName($hash));

            $fileName = $filesCollect->get($keyFile);

            return json_decode($this->setDisk()->get($this->storagePath . $fileName), 1);
        }

        return null;
    }

    public function has($hash): bool
    {
        $files = $this->getAllFiles();

        if (!empty($files)) {
            $filesCollect = $this->getBasePathFiles($files);

            return $filesCollect->search($this->getFileName($hash)) !== false;
        }

        return false;
    }

    private function getAllFiles(): array
    {
        return $this->setDisk()->allFiles($this->storagePath);
    }

    private function getFileName($hash)
    {
        return $hash . '.txt';
    }

    private function getBasePathFiles(array $files): Collection
    {
        return collect($files)->map(function($item){
            return basename($item);
        });
    }

    private function setDisk(): FilesystemAdapter
    {
        return \Storage::disk($this->disk);
    }
}
