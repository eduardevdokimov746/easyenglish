<?php

namespace App\Ship\Services;

class TranslateApiService
{
    protected $key = '';
    protected $serviceDomain = 'https://developers.lingvolive.com/';
    protected $initUrl = 'api/v1.1/authenticate';
    protected $requestUrl = 'api/v1/Minicard';
    protected $srcLang = '1033';
    protected $dstLang = '1049';
    protected $content = '';

    public function __construct($content)
    {
        $this->key = file_get_contents('key.txt');
        $this->setContent($content);
    }

    protected function setKey()
    {
        $c = curl_init($this->createInitUrl());
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_HTTPHEADER, ['Authorization:' . ' Basic ZjBlMDUxZjYtY2NiNS00OGIxLTg0MGQtYWEwN2EyNjY5NjkwOjQ2ZGNhYmYwODQ1ZDRmMzBhOTE3NTdlYjYyY2RiNDNi', 'Content-Length: 0']);

        $key = curl_exec($c);
        file_put_contents('key.txt', $key);

        if ($key === false) {
            return null;
        }

        $this->key = $key;

        curl_close($c);
    }

    protected function setContent($content)
    {
        $this->content = $content;
    }

    public function request()
    {
        $c = curl_init($this->createRequestUrl());
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_HTTPHEADER, ['Authorization:' . ' Bearer ' . $this->key, 'Content-Length: 0']);

        $data = curl_exec($c);


        if ($data === false) {
            $this->setKey();
        }

        $c = curl_init($this->createRequestUrl());
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_HTTPHEADER, ['Authorization:' . ' Bearer ' . $this->key, 'Content-Length: 0']);

        $data = curl_exec($c);

        curl_close($c);

        return $this->mapData($data);
    }

    protected function mapData($data)
    {
        $translateWords = json_decode($data, 1);

        if (is_array($translateWords) && isset($translateWords['Translation']) && isset($translateWords['Translation']['Translation'])) {
            $translateWords = $translateWords['Translation']['Translation'];
            $result = collect(preg_split('#[;,]#', $translateWords))->filter()->map(function($item){
                return mb_strtolower(trim($item));
            })->unique()->toArray();

            if (empty($result)) {
                return null;
            }

            return $result;
        }

        return null;
    }

    protected function createInitUrl()
    {
        return $this->serviceDomain . $this->initUrl;
    }

    protected function createRequestUrl()
    {
        $queryParams = [
            'text' => $this->content,
            'srcLang' => $this->srcLang,
            'dstLang' => $this->dstLang
        ];

        return $this->serviceDomain . $this->requestUrl . '?' . http_build_query($queryParams);
    }
}
