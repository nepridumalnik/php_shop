<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction()
    {
        parent::setMeta(\ishop\App::$app->getProperty('shop_name'), 'Описание', 'Ключевые слова');
        $this->setData(['name' => 'Ivan', 'age' => 20]);
    }
}

?>