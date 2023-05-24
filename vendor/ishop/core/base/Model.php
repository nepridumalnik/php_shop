<?php

namespace ishop\base;

use ishop\Db;

abstract class Model
{
    public array $atributes = [];
    public array $errors = [];
    public array $rules = [];

    public function __construct()
    {
        Db::instance();
    }
}

?>