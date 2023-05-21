<!DOCTYPE html>
<html lang="en">

<?php

function outputData($text, $data)
{
    echo '<p><b>' . $text . '</b>: ' . $data . '</p>';
}

outputData('Код ошибки', $errno);
outputData('Текст ошибки', $errstr);
outputData('Файл ошибки', $errfile);
outputData('Строка ошибки', $errline);
outputData('Код HTTP', $responce);

?>