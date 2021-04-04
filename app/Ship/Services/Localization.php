<?php

namespace App\Ship\Services;

class Localization
{
    private $baseLocaleConfigKey = 'localization.ship_locale_path';
    protected $baseLocalePath = '';
    protected $currentLocale = 'ru';
    protected $shipValidationFileName = 'validation.php';

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        $this->setBaseLocalePath(config($this->baseLocaleConfigKey));
        $this->setCurrentLocale(config('app.locale'));
    }

    public function setBaseLocalePath(string $basePath)
    {
        $this->baseLocalePath = $basePath;
    }

    public function setCurrentLocale(string $locale)
    {
        $this->currentLocale = $locale;
    }

    public function getShipValidation()
    {
        $fullPath = $this->baseLocalePath . '/' . $this->currentLocale . '/' . $this->shipValidationFileName;

        if (!file_exists($fullPath)) {
            return null;
        }

        return include($fullPath);
    }

    public function includeFile(string $fileName)
    {
        $fullPath = $this->baseLocalePath . '/' . $this->currentLocale . '/' . $fileName . '.php';

        if (!file_exists($fullPath)) {
            return null;
        }

        return include($fullPath);
    }
}
