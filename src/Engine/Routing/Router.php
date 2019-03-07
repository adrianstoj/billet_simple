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
            $pattern = "#^$url|i$#";
            $contentParam = null;
            if ($route->getParam() != null) {
                $contentParam = $route->getParam();
            }
            $pattern = str_replace('|i', $contentParam, $pattern);

            if (preg_match($pattern, $this->uri) && $route->getMethod() == $this->method) {
                $this->action = $route->getAction();
                $this->callable = $route->getCallable();
            }
        }
    }

    public function call()
    {
        $controller =  "BilletSimple\\Controller\\" . $this->callable["_controller"];
        $controller = new $controller();
        $action = $this->action;
        $controller->$action();
    }

}