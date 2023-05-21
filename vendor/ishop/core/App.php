<?php

namespace ishop;

class App
{
    public static Registry $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        // session_start();

        self::$app = Registry::instance();

        $this->getParams();
        new ErrorHandler;
    }

    public function __destruct()
    {
        // session_destroy();
    }

    private function getParams()
    {
        $params = require_once CONF . '/params.php';

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}

?>