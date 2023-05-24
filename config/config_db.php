<?php

define('DB_CONFIG', [
    'dsn' => 'mysql:host=mysql;port=3306;dbname=ishop;charset=utf8',
    'user' => 'root',
    'pass' => getenv('MYSQL_ROOT_PASSWORD'),
]);

return DB_CONFIG;

?>