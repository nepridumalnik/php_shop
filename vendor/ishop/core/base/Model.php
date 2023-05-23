<?php

abstract class Model
{
    public array $atributes = [];
    public array $errors = [];
    public array $rules = [];

    public function __construct()
    {
        
    }
}

?>