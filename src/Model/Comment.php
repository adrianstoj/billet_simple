<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/12/18
 * Time: 12:54
 */

namespace BilletSimple\Model;

class Comment
{
    private $id;

    private $author;

    private $title;

    private $content;

    private $comment_date;

    private $chapter_id;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
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

    public function getCommentDate()
    {
        return $this->comment_date;
    }

    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    public function getChapterId()
    {
        return $this->chapter_id;
    }

    public function setChapterId($chapter_id)
    {
        $this->chapter_id = $chapter_id;
    }
}