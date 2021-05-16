<?php

namespace App\Containers\TeacherSection\ResponseStudent\Breadcrumbs;

use App\Containers\TeacherSection\Zadanie\Breadcrumbs\ZadanieList;
use App\Ship\Abstracts\AbstractBreadcrumbItem;

class ListResponses extends AbstractBreadcrumbItem
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
        return 'Список ответов';
    }
}
