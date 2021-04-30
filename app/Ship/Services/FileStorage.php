<?php

namespace App\Ship\Services;

use App\Containers\User\Models\User;
use Illuminate\Http\UploadedFile;

class FileStorage
{
    protected $pathIcons = 'file_icons/png/';
    protected $currentUploadFolder = '';
    protected $currentFolder = '';
    protected $currentPublicFolder = '';

    public function add($fileTmpPath, $fileName)
    {
        $fileName = md5($fileName . $fileTmpPath) . '.' . $this->getExtension($fileName);
        $path = storage_path($this->currentUploadFolder . $fileName);

        try{
            move_uploaded_file($fileTmpPath, $path);

            return $fileName;
        }catch (\Exception){
            return false;
        }
    }

    public function has($file)
    {
        $files = collect(\Storage::files($this->currentFolder));

        $isset = $files->search(function($item) use ($file){
            return $file === basename($item);
        });

        return $isset === false ? false : true;
    }

    public function delete($file)
    {
        return \Storage::delete($this->currentFolder . $file);
    }

    public function getExtension($name)
    {
        return pathinfo($name, PATHINFO_EXTENSION);
    }

    public function getFileName($name)
    {
        return pathinfo($name, PATHINFO_FILENAME);
    }

    public function getIconExtension($ext): string
    {
        $fileName = $this->mapIcons($ext);

        return asset($this->pathIcons . $fileName);
    }

    public function getSize(int $bytes): string
    {
        if ($bytes === 0) return '0байт';

        $k = 1024;

        $sizes = ['байт', 'КБ', 'MБ', 'ГБ'];

        $i = floor(log($bytes) / log($k));

        return ceil($bytes / pow($k, $i)) . $sizes[$i];
    }

    public function toSection(): self
    {
        $this->currentFolder = 'section/';
        $this->currentUploadFolder = 'app/public/section/';
        return $this;
    }

    public function getPathForDownload($fileName)
    {
        return $this->currentFolder . $fileName;
    }

    private function mapIcons($ext): string
    {
        switch ($ext) {
            case('doc'): return 'doc.png';
            case('docx'): return 'doc.png';
            case('txt'): return 'txt.png';
            case('iso'): return 'iso.png';
            case('mp3'): return 'mp3.png';
            case('jpg'): return 'jpg.png';
            case('pdf'): return 'pdf.png';
            case('html'): return 'html.png';
            case('css'): return 'css.png';
            case('png'): return 'png.png';
            case('ppt'): return 'ppt.png';
            case('mp4'): return 'mp4.png';
            case('psd'): return 'psd.png';
            case('rtf'): return 'rtf.png';
            case('xml'): return 'xml.png';
            case('zip'): return 'zip.png';
            default: return 'file.png';
        }
    }

    public function getIcons(): array
    {
        return collect($this->icons())->map(function($item){
            return asset($this->pathIcons . $item);
        })->toArray();
    }

    protected function icons(): array
    {
        return [
            'doc' => 'doc.png',
            'docx' =>  'doc.png',
            'txt' =>  'txt.png',
            'iso' =>  'iso.png',
            'mp3' =>  'mp3.png',
            'jpg' =>  'jpg.png',
            'pdf' =>  'pdf.png',
            'html' =>  'html.png',
            'css' =>  'css.png',
            'png' =>  'png.png',
            'ppt' =>  'ppt.png',
            'mp4' =>  'mp4.png',
            'psd' =>  'psd.png',
            'rtf' =>  'rtf.png',
            'xml' =>  'xml.png',
            'zip' =>  'zip.png',
            'default' => 'file.png'
        ];
    }
}
