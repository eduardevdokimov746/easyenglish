<?php

namespace App\Containers\User\Breadcrumbs;

use App\Ship\Abstracts\AbstractBreadcrumbItem;
use App\Ship\Services\Breadcrumbs\IndexPage;

class IndexUser extends AbstractBreadcrumbItem
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
        return 'Профиль';
    }

    protected function url()
    {
        return route('web_user_show', \Auth::user()->login);
    }
}
