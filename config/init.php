<?php

// 1 Разработка, 0 Продакшн
define('DEBUG', 1);

// Корень проекта
define('ROOT', dirname(__DIR__));

// Путь до публичной папки
define('WWW', ROOT . '/public');

// Путь до папки с компонентами
define('APP', ROOT . '/app');

// Путь до папки с библиотеками
define('CACHE', ROOT . '/tmp/cache');

// Путь до папки с конфигурационными файлами
define('CONF', ROOT . '/config');

// Путь до папки с шаблоном по умолчанию
define('LAYOUT', 'default');

// Путь до папки с классами ядра
define('CORE', ROOT . '/vendor/ishop/core');

// Путь до папки с библиотеками
define('LIBS', CORE . '/libs');

require_once ROOT . '/vendor/autoload.php';

?>