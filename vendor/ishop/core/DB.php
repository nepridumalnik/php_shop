<?php

namespace ishop;

class Db
{
    use TSingleton;

    private function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);

        if (false === \R::testConnection()) {
            $errorInfo = \R::getDatabaseAdapter()
                ->getDatabase()
                ->getPDO()
                ->errorInfo();

            throw new \Exception('Нет соединения с базой данных: ' . $errorInfo, 500);
        }

        echo 'Соединение установлено';
    }
}

?>