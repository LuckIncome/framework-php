<?php

namespace app\controllers;


use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{

    //public $layout = 'main';
    //public $view = 'main';

    public function indexAction()
    {
        //\R::fancyDebug(true);
        $model = new Main;

        $posts = \R::findAll('posts');




        $menu = $this->menu;


        $title = 'Page title';

        View::setMeta('Заголовок главной страницы', 'Описание главной страницы', 'Ключевые слова главной страницы');
        //$this->setMeta('Главная страница', 'Описание главной страницы', 'Ключевые слова главной страницы');
        //$meta = $this->meta;

        $this->set(compact('title','posts', 'menu'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {

            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");

            $this->loadView('_test', compact('post'));

            die;
        }
        echo 222;

        //$this->layout = 'test';
    }

}