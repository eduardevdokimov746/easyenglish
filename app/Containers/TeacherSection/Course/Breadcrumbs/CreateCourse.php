<?php

namespace App\Containers\TeacherSection\Course\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CreateCourse extends AbstractBreadcrumbItem
{
    protected $next = MaterialList::class;
    protected $isCurrent = 1;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function title(): string
    {
        return 'Создание курса';
    }
}
