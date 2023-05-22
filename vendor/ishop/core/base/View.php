<?php

namespace ishop\base;

/**
 * View
 * 
 * Базовый класс вида
 */
class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];

    /**
     * Консруктор
     * @param mixed $route
     * @param mixed $meta
     * @param mixed $layout
     * @param mixed $view
     */
    public function __construct($route, $meta, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->model = $route['controller'];
        $this->view = $view;
        $this->controller = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    /**
     * Отрисовка данных
     * @throws \Exception
     * @return void
     */
    public function render($data): void
    {
        if (is_array($data)) {
            extract($data);
        }


        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (file_exists($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception('Не найден вид ' . $this->view, 404);
        }

        if ($this->layout !== false) {
            $layoutFile = APP . "/views/Layouts/{$this->layout}.php";

            if (file_exists($layoutFile)) {
                $meta = $this->getMeta();
                require_once $layoutFile;
            } else {
                throw new \Exception('Не найден шаблон ' . $this->layout, 404);
            }
        }
    }

    /*
     * Получить метаданные
     * 
     * @return string
     */
    public function getMeta(): string
    {
        $meta = '';

        foreach ($this->meta as $key => $value) {
            if ($key != 'title' && $value) {
                $meta .= "<meta name=\"{$key}\" content=\"{$value}\">" . PHP_EOL;
            }
        }

        $title = '';

        if ($this->meta['title']) {
            $title = $this->meta['title'];
        } else {
            $title = 'Document';
        }

        $meta .= "<title>{$title}</title>";

        return $meta;
    }
}

?>