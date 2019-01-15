<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/01/19
 * Time: 21:18
 */

namespace BilletSimple\Engine\Routing;


class Router
{
    private $url;

    private $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes[] = $route;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if ($route->match($this->url))
            {
                $route->getCallable();
            }
        }
    }
}