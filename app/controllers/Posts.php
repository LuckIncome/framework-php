<?php

namespace app\controllers;

class Posts extends \vendor\core\base\Controller
{
    public function indexAction()
    {
        echo "Posts::indexAction";
    }

    public function testAction()
    {
        debug($this->route);
        echo "Posts::test";
    }
}