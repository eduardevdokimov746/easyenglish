<?php

namespace App\Containers\TeacherSection\Course\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;
use App\Ship\Services\Breadcrumbs\IndexPage;

class CourseList extends AbstractBreadcrumbItem
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
        return 'Список курсов';
    }

    protected function url(): string
    {
        return route('web_teacher_courses_index');
    }
}
