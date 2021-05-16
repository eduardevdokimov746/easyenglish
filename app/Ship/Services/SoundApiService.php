<?php

namespace App\Ship\Services;

class SoundApiService
{
    protected $key = '735c1a61f45f486aa48c2d47938436c3';
    protected $country = 'en-gb';
    protected $voice = 'Harry';
    protected $format = 'mp3';
    protected $serviceDomain = 'http://api.voicerss.org/';
    protected $codec = '48khz_16bit_mono';
    protected $content = '';
    protected $speed = '';

    public function getNormal($word)
    {
        $this->setContent($word);
        $this->speed = '-1';
        return $this->request();
    }

    public function getSlow($word)
    {
        $this->setContent($word);
        $this->speed = '-7';
        return $this->request();
    }

    protected function setContent($content)
    {
        $this->content = str_replace(' ', '+', $content);
    }

    protected function request()
    {
        $query = $this->createQueryString();

        return file_get_contents($query);
    }

    protected function createQueryString()
    {
        $queryParams = [
            'key' => $this->key,
            'hl' => $this->country,
            'c' => $this->format,
            'src' => $this->content,
            'v' => $this->voice,
            'r' => $this->speed,
            'f' => $this->codec
        ];

        return $this->serviceDomain . '?' . http_build_query($queryParams);
    }
}
