<?php

namespace App\Containers\TeacherSection\ResponseStudent\Breadcrumbs;

use App\Containers\TeacherSection\Zadanie\Breadcrumbs\ZadanieList;
use App\Ship\Abstracts\AbstractBreadcrumbItem;

class SingleResponse extends AbstractBreadcrumbItem
{
    protected $next = ListResponses::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function createNext($data = [])
    {
        $data = [
            'id' => $this->data['id'],
            'url' => route('web_teacher_responses_students_index', $this->data['id'])
        ];

        return parent::createNext($data);
    }

    protected function title(): string
    {
        return 'Ответ на задание';
    }
}
