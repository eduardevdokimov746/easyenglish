<?php

namespace App\Ship\Interfaces;

interface BreadcrumbItemInterface
{
    public function draw($html = '');

    public function current(): void;
}
