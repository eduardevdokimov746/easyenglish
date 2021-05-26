<?php

namespace App\Containers\TeacherSection\Course\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CourseSingle extends AbstractBreadcrumbItem
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
        return $this->data['title'];
    }
}
