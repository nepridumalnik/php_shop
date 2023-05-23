<?php

namespace ishop;

class DB
{
    use TSingleton;

    private function __construct()
    {
        $db = require_once CONF . '/config_db.php';
    }
}

?>