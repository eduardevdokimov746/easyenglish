<?php

namespace App\Ship\Abstracts;

use App\Ship\Interfaces\BreadcrumbItemInterface;

abstract class AbstractBreadcrumbItem implements BreadcrumbItemInterface
{
    protected $next;
    protected $data;
    protected $isCurrent = 0;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function current(): void
    {
        $this->isCurrent = 1;
    }

    protected function hasNext()
    {
        return !empty($this->next);
    }

    public function draw($html = '')
    {
        $breadcrumbs = '';

        if (!empty($this->next)) {
            $next = $this->createNext();
            $breadcrumbs = $next->draw($html);
        }

        return $breadcrumbs;
    }

    protected function createNext()
    {
        return new $this->next();
    }

    protected function getTemplateCurrent()
    {
        $title = $this->getTitle();

        return \View::make('components.breadcrumb_current', compact('title'));
    }

    protected function getTemplateMiddle()
    {
        $url = $this->getUrl();
        $title = $this->getTitle();

        return \View::make('components.breadcrumb_link', compact('url', 'title'));
    }

    protected function getTemplate()
    {
        if ($this->isCurrent) {
            return $this->getTemplateCurrent();
        } else {
            return $this->getTemplateMiddle();
        }
    }

    abstract protected function getTitle(): string;
    abstract protected function getUrl(): string;
}
