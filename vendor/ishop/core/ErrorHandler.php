<?php

namespace ishop;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    private function logErrors($message = '', $file = '', $line = '')
    {
        echo 'Logging in: ' . ROOT . '/tmp/errors.log';
        error_log(
            '[' . date('d-m-Y H:i:s') . "] Текст ошибки: $message\nФайл: $file | Строка: $line\n#####################################",
            3,
            ROOT . '/tmp/errors.log'
        );
    }

    private function displayError($errno, $errstr, $errfile, $errline, $responce = 404)
    {
        http_response_code($responce);

        if (DEBUG) {
            require_once WWW . '/errors/dev.php';
            die;
        }

        if ($responce == 404) {
            require_once WWW . '/errors/404.php';
            die;
        }

        require_once WWW . '/errors/prod.php';
        die;
    }
}

?>