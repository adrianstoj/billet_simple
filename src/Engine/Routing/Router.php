<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/01/19
 * Time: 21:18
 */

namespace BilletSimple\Engine\Routing;

use BilletSimple\Engine\Routing\RouteCollection;
use BilletSimple\Engine\Routing\Route;
class Router
{
    private $uri;

    private $method;

    private $callable;

    private $collection;

    private $action;

    public function __construct($collection)
    {
        $this->uri = ($_SERVER['REQUEST_URI']);
        $this->method = ($_SERVER['REQUEST_METHOD']);

        $this->collection = $collection;
    }

    public function match()
    {
        foreach ($this->collection->getAll() as $route)
        {
            $url = $route->getPath();
            if ($url == $this->uri)
            {
                $this->method = $route->getMethod();
                $this->callable = $route->getCallable();
            }
        }
    }

    public function call()
    {
        $controller =  "BilletSimple\\Controller\\" . $this->callable["_controller"];
        $controller = new $controller();
        $action = $this->method;
        $controller->$action();
    }

}