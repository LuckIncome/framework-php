<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');
echo $query;

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

debug(Router::getRoutes());

if(Router::matchRoute($query))
{
    debug(Router::getRoute());
} else
{
    echo '404';
}