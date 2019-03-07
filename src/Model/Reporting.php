<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 15/12/18
 * Time: 12:59
 */

namespace BilletSimple\Model;

class Reporting
{
    private $id;

    private $comment_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCommentId()
    {
        return $this->comment_id;
    }

    public function setCommentId($comment_id)
    {
        $this->comment_id = $comment_id;
    }
}