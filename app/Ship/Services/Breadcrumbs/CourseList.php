<?php

namespace App\Ship\Services\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CourseList extends AbstractBreadcrumbItem
{
    protected $next = IndexPage::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function getTitle(): string
    {
        return 'Список курсов';
    }

    protected function getUrl(): string
    {
        return $this->data['url'];
    }
}
