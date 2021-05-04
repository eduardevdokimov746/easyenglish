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

    protected function createNext($data = [])
    {
        return new $this->next($data);
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

    protected function getUrl()
    {
        if (isset($this->data['url']) && !empty($this->data['url'])) {
            return $this->data['url'];
        }

        if (method_exists($this, 'url')) {
            return $this->url();
        }

        return '';
    }

    protected function getTitle()
    {
        if (isset($this->data['title']) && !empty($this->data['title'])) {
            return $this->data['title'];
        }

        return $this->title();
    }

    protected function url()
    {
        return '';
    }

    abstract protected function title(): string;
}
