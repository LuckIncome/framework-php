<?php

namespace app\controllers;

class Page extends \vendor\core\base\Controller
{
    public function viewAction()
    {
        debug($this->route);
        debug($_GET);
        echo $_GET['page'];
        echo "Posts::view";
    }
}