<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/12/18
 * Time: 12:54
 */

namespace BilletSimple;

class Comment
{
    private $id;

    private $title;

    private $content;

    private $reportings;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->id = $title;
        return $this->title;
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