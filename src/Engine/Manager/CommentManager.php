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
    protected $pdo;

    protected $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=billet_simple', 'root', 'testsql');
    }

    public function create(Comment $comment)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO comments VALUES (:title, :content, :chapter_id)');
        $this->pdoStatement->bindValue(':title', $comment->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':chapter_id', $comment->getChapterId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }

    public function readAllBy($chapterId)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM comments WHERE chapter_id = :chapter_id');
        $this->pdoStatement->bindValue(':chapter_id', $chapterId, PDO::PARAM_INT);
        $this->pdoStatement->execute();

        $comments = [];

        while ($comment = $this->pdoStatement->fetchObject('BilletSimple\Model\Comment'))
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