<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 20/01/19
 * Time: 21:50
 */

namespace BilletSimple\Engine\Routing;


class RouteCollection
{
    private $routes = array();

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function getAll()
    {
        return $this->routes;
    }
}