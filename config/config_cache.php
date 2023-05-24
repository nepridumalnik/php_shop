<?php

echo 'CACHE_HOSTNAME: ' . getenv('CACHE_HOSTNAME');

define('CACHE_CONFIG', [
    'scheme' => 'tcp',
    'host' => 'rediska',
    'port' => 6379,
]);

return CACHE_CONFIG;

?>