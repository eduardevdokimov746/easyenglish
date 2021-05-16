<?php

namespace App\Containers\TeacherSection\Zadanie\Breadcrumbs;

use App\Containers\TeacherSection\Course\Breadcrumbs\CourseList;
use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CreateZadanie extends AbstractBreadcrumbItem
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
        return 'Создание задания';
    }
}
