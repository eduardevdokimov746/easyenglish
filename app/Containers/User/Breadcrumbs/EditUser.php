<?php

namespace App\Containers\User\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;

class EditUser extends AbstractBreadcrumbItem
{
    protected $next = IndexUser::class;

    public function draw($html = '')
    {
        $html = parent::draw($html);

        $html .= $this->getTemplate();

        return $html;
    }

    protected function title(): string
    {
        return 'Редактирование профиля';
    }
}
