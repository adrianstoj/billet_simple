<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/01/19
 * Time: 22:09
 */

namespace BilletSimple\Engine\Routing;


class Route
{
    private $name;

    private $path;

    private $method;

    private $param;

    private $callable;

    private $action;


    public function __construct($name, $path, $method, $param, $callable, $action)
    {
        $this->name = $name;
        $this->path = $path;
        $this->method = $method;
        $this->param = $param;
        $this->callable = $callable;
        $this->action = $action;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParam()
    {
        return $this->param;
    }
}