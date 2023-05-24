<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction()
    {
        parent::setMeta(\ishop\App::$app->getProperty('shop_name'), 'Описание', 'Ключевые слова');

        $a = array('name' => 'Ivan', 'age' => 20);

        $cache = \ishop\Cache::instance();

        $cache->delete('test');

        $data = $cache->get('test');

        if (!$data) {
            $cache->set('test', serialize($a));
            $data = $cache->get('test');
            $data = unserialize($data);
        }

        debug($data);

        $this->setData($a);
    }
}

?>