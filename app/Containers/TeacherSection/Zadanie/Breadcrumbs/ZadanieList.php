<?php

namespace App\Containers\TeacherSection\Zadanie\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;
use App\Containers\TeacherSection\Course\Breadcrumbs\CourseList;

class ZadanieList extends AbstractBreadcrumbItem
{
    protected $next = CourseList::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function createNext($data = [])
    {
        $data = [
            'url' => route('web_teacher_courses_zadanies')
        ];

        return parent::createNext($data);
    }

    protected function title(): string
    {
        return 'Список заданий';
    }
}
