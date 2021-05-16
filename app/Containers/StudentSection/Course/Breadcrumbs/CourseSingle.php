<?php

namespace App\Containers\StudentSection\Course\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CourseSingle extends AbstractBreadcrumbItem
{
    protected $next = CourseList::class;

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
