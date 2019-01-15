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

    private $callable;

    private $matches = [];

    private $params = [];

    public function __construct($path, $callable)
    {
        $this->path = $path;
        $this->callable = $callable;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call(){
        return call_user_func_array($this->callable, $this->matches);
    }
}