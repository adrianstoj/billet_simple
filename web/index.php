<?php

use BilletSimple\Engine\Routing\Route;
use BilletSimple\Engine\Routing\Router;
use BilletSimple\Engine\Routing\RouteCollection;

require_once '../vendor/autoload.php';

$routesCollection = array();
$route = new Route('/', 'route_name', ['_controller' => 'Controller1']);
$route2 = new Route('/foo', 'route_foo', ['_controller' => 'Controller2']);
array_push($routesCollection, $route, $route2);
$routes = new RouteCollection($routesCollection);
$router = new Router($routes);
var_dump($router);
//$router->match(); // matcher la nouvelle route avec la collection



