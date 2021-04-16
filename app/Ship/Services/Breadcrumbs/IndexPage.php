<?php

namespace App\Ship\Services\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class IndexPage extends AbstractBreadcrumbItem
{
    public function draw($html = '')
    {
        parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function getTemplate()
    {
        return $this->getTemplateMiddle();
    }

    protected function getTitle(): string
    {
        return 'Главная';
    }

    protected function getUrl(): string
    {
        return route('index');
    }
}
