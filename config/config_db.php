<?php

echo getenv('DB_HOSTNAME');

define('DB_CONFIG', [
    'dsn' => 'mysql:host=mysql;port=3306;dbname=' . getenv('DB_NAME') . ';charset=utf8',
    'user' => getenv('DB_USER'),
    'pass' => getenv('DB_PASSWORD'),
]);

return DB_CONFIG;

?>