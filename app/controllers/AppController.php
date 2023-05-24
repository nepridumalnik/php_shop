<?php

namespace app\controllers;

use app\models\AppModel;

class AppController extends \ishop\base\Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}

?>