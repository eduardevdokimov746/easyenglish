<?php

namespace App\Ship\Services;

use App\Ship\Interfaces\BreadcrumbItemInterface;

class Breadcrumbs
{
    public function show(BreadcrumbItemInterface $item)
    {
        $item->current();

        return $item->draw();
    }
}
