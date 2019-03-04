<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/12/18
 * Time: 12:44
 */

namespace BilletSimple\Model;

use BilletSimple\Engine\Entity;
use BilletSimple\Engine\PDO;

class Chapter
{
    private $id;

    private $title;

    private $content;

    private $slug;

    private $date;

    private $comments;

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

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->id = $slug;
        return $this->slug;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->id = $date;
        return $this->date;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}