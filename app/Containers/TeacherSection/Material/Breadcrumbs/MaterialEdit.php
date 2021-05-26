<?php

namespace App\Containers\TeacherSection\Material\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class MaterialEdit extends AbstractBreadcrumbItem
{
    protected $next = MaterialList::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function title(): string
    {
        return 'Редактирование материала';
    }
}
