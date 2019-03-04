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
    private $path;

    private $param;

    private $name;

    private $callable;

    private $method;


    public function __construct($name, $path, $param, $callable, $method)
    {
        $this->path = $path;
        $this->param = $param;
        $this->name = $name;
        $this->callable = $callable;
        $this->method = $method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParam()
    {
        return $this->param;
    }
}