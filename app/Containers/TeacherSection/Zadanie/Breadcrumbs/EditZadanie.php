<?php

namespace App\Containers\TeacherSection\Zadanie\Breadcrumbs;

use App\Containers\TeacherSection\Course\Breadcrumbs\CourseList;
use App\Ship\Abstracts\AbstractBreadcrumbItem;

class EditZadanie extends AbstractBreadcrumbItem
{
    protected $next = ZadanieList::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function createNext($data = [])
    {
        $data = [
            'url' => route('web_teacher_zadanies_index', $this->data['id'])
        ];

        return parent::createNext($data);
    }

    protected function title(): string
    {
        return 'Редактирование задания';
    }
}
