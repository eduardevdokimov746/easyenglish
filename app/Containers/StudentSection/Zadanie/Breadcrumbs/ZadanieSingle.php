<?php

namespace App\Containers\StudentSection\Zadanie\Breadcrumbs;

use App\Containers\StudentSection\Course\Breadcrumbs\CourseSingle;
use App\Ship\Abstracts\AbstractBreadcrumbItem;

class ZadanieSingle extends AbstractBreadcrumbItem
{
    protected $next = CourseSingle::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function createNext($data = [])
    {
        $data = [
            'title' => $this->data['next_title'],
            'url' => $this->data['next_url']
        ];

        return parent::createNext($data);
    }

    protected function title(): string
    {
        return $this->data['title'];
    }
}
