<?php

namespace app\controllers;


use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{

    //public $layout = 'main';
    //public $view = 'main';

    public function indexAction()
    {
        $model = new Main;

        $posts = \R::findAll('posts');

        $menu = $this->menu;

        $title = 'Page title';

        $this->setMeta('Главная страница', 'Описание главной страницы', 'Ключевые слова главной страницы');
        $meta = $this->meta;

        $this->set(compact('title','posts', 'menu', 'meta'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            echo 111;
            die;
        }
        echo 222;

        //$this->layout = 'test';
    }

}