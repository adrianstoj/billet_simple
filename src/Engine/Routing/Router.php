<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/01/19
 * Time: 21:18
 */

namespace BilletSimple\Engine\Routing;

use BilletSimple\Engine\Routing\RouteCollection;
class Router
{
    private $uri;

    private $method;

    private $routes = array();

    public function __construct($routes)
    {
        $this->uri = ($_SERVER['REQUEST_URI']);
        $this->method = ($_SERVER['REQUEST_METHOD']);

        $this->routes = $routes;
    }
}