<?php

use BilletSimple\Engine\Routing\Route;
use BilletSimple\Engine\Routing\Router;
use BilletSimple\Engine\Routing\RouteCollection;

require_once '../vendor/autoload.php';

$routes = new RouteCollection();
$routes->add(
    'homepage',
    new Route('homepage',
        '/',
        ['_controller' => 'HomeController'],
        'index'));
$routes->add(
    'error',
    new Route('404',
        '/.*',
        ['_controller' => 'Controller1'],
        'index'));
$router = new Router($routes);

$router->match();
$router->call();



