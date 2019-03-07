<?php

use BilletSimple\Engine\Routing\Route;
use BilletSimple\Engine\Routing\Router;
use BilletSimple\Engine\Routing\RouteCollection;
use BilletSimple\Engine\Routing\TestRouting;

require_once '../vendor/autoload.php';

$routes = new RouteCollection();
$routes->add(
    '404',
    new Route('404',
        '/',
        'GET',
        '.*',
        ['_controller' => 'ErrorController'],
        'index'));
$routes->add(
    'table',
    new Route('table',
        '/table',
        'GET',
        '',
        ['_controller' => 'TableController'],
        'index'));
$routes->add(
    'contact',
    new Route('contact',
        '/contact',
        'GET',
        '',
        ['_controller' => 'ContactController'],
        'index'));
$routes->add(
    'chapter-',
    new Route('chapter-',
        '/chapitre-',
        'GET',
        '[0-9]+',
        ['_controller' => 'ChapterController'],
        'index'));
$routes->add(
    'homepage',
    new Route('homepage',
        '/',
        'GET',
        '',
        ['_controller' => 'HomeController'],
        'index'));
// Add comment
$router = new Router($routes);

$router->match();
$router->call();