<?php

namespace App\Containers\TeacherSection\Material\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;
use App\Ship\Services\Breadcrumbs\IndexPage;

class MaterialList extends AbstractBreadcrumbItem
{
    protected $next = IndexPage::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function title(): string
    {
        return 'Список материалов';
    }

    protected function url(): string
    {
        return route('web_teacher_materials_index');
    }
}
