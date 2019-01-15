<?php

use BilletSimple\Engine\Request;
use BilletSimple\Engine\Routing\Router;

require_once '../vendor/autoload.php';

$request = new Request();

//var_dump($router->getUrl());

$router = new Router($request->getUri());
$router->get('/', function() {
    echo 'homepage';
});

$router->run();