<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/12/18
 * Time: 12:59
 */

namespace BilletSimple;

class Reporting
{
    private $id;

    private $name;

    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->id = $name;
        return $this->name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->id = $content;
        return $this->content;
    }
}