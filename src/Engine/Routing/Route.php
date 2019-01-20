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

    private $name;

    private $callable;

    public function __construct($path, $name, $callable)
    {
        $this->path = $path;
        $this->name = $name;
        $this->callable = $callable;
    }
}