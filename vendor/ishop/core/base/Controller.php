<?php

namespace ishop\base;

abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->controller = $route['controller'];
        $this->prefix = $route['prefix'];
    }

    public function getView()
    {
        $viewObject = new \ishop\base\View($this->route, $this->meta, $this->layout, $this->view);
        $viewObject->render($this->data);
    }

    protected function setData($data)
    {
        $this->data = $data;
    }

    protected function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}

?>