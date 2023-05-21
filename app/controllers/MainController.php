<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction()
    {
        parent::setMeta('Main', 'Описание', 'Ключевые слова');
        echo 'Хуй';
    }
}

?>