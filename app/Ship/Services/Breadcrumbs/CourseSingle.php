<?php

namespace App\Ship\Services\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class CourseSingle extends AbstractBreadcrumbItem
{
    protected $next = CourseList::class;

    protected function createNext()
    {
        $data = [
            'url' => route('web_teacher_courses_index')
        ];

        return new $this->next($data);
    }

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function getTitle(): string
    {
        return $this->data['title'];
    }

    protected function getUrl(): string
    {
        return $this->data['url'];
    }
}
