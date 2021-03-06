<?php

namespace App\Containers\TeacherSection\Course\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CourseEdit extends AbstractBreadcrumbItem
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
            'title' => $this->data['title_next'],
            'url' => route('web_teacher_courses_show', $this->data['id'])
        ];

        return parent::createNext($data);
    }

    protected function title(): string
    {
        return 'Редактирование курса';
    }
}
