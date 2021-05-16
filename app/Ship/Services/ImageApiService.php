<?php

namespace App\Ship\Services;

class ImageApiService
{
    protected $key = '9pHpoV5wvVlvBtjUjJwuT1YVxFl2Z3_00cTqkUf5L_E';
    protected $serviceDomain = 'https://api.unsplash.com/search/photos';
    protected $pre_page = '1';
    protected $content = '';

    public function __construct($content)
    {
        $this->setContent($content);
    }

    protected function setContent($content)
    {
        $this->content = $content;
    }

    public function request()
    {
        $query = $this->createQueryString();

        $data = file_get_contents($query);

        return $this->mapData($data);
    }

    protected function mapData($data)
    {
        $data = json_decode($data, 1);

        if(!empty($data['results']) && $data['results'][0]['urls']['small']){
            $url = $data['results'][0]['urls']['small'];

            preg_match('#fm=([a-z]+)&#', $url, $m);

            if(isset($m[1])){
                $ext = $m[1];
                $imageData = file_get_contents($url);
                $storagePath = 'word_images/';
                $fileName = md5(microtime()) . '.' . $ext;
                $filePath = $storagePath . $fileName;
                \Storage::put($filePath, $imageData);
                return $fileName;
            }
        }

        return null;
    }

    protected function createQueryString()
    {
        $queryParams = [
            'query' => $this->content,
            'client_id' => $this->key,
            'per_page' => $this->pre_page
        ];

        return $this->serviceDomain . '?' . http_build_query($queryParams);
    }
}
