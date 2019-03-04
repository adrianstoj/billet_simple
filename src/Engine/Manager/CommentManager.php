<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 04/03/19
 * Time: 14:56
 */

namespace BilletSimple\Engine\Manager;

use PDO;
use BilletSimple\Model\Comment;

class CommentManager
{
    private $pdo;

    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=billet_simple', 'root', 'testsql');
    }

    public function create(Comment $comment)
    {

    }

    public function readAllBy($chapterId)
    {
        $this->pdoStatement = $this->pdo->query('SELECT Comment.title, Comment.content FROM Chapter, Comment WHERE Comment.chapter_id = Chapter.id AND chapter_id = :chapter_id');
        dump($this->pdoStatement);
        die;
        $this->pdoStatement->bindValue(':chapter_id', $chapterId, PDO::PARAM_INT);

        $comments = [];

        while ($comment = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter'))
        {
            $comments[] = $comment;
        }

        return $comments;
    }

    public function update(Comment $comment)
    {

    }

    public function delete(Comment $comment)
    {

    }
}