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

class CommentManager extends Manager
{
    public function create(Comment $comment)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO comments (id, author, title, content, comment_date, chapter_id, chapter_number, reported) VALUES (NULL, :author, :title, :content, :comment_date, :chapter_id, :chapter_number, :reported)');
        $this->pdoStatement->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $comment->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':comment_date', $comment->getCommentDate(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':chapter_id', $comment->getChapterId(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':chapter_number', $comment->getChapterNumber(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':reported', 1, PDO::PARAM_INT);
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

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM comments');
        $this->pdoStatement->execute();

        $comments = [];

        while ($comment = $this->pdoStatement->fetchObject('BilletSimple\Model\Comment'))
        {
            $comments[] = $comment;
        }

        return $comments;
    }

    public function readLast()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM comments ORDER BY comment_date DESC LIMIT 3');

        $comments = [];

        while ($comment = $this->pdoStatement->fetchObject('BilletSimple\Model\Comment'))
        {
            $comments[] = $comment;
        }

        return $comments;
    }

    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $request = $this->pdoStatement->execute();

        if ($request) {
            $comment = $this->pdoStatement->fetchObject('BilletSimple\Model\Comment');

            if ($comment == false) {
                return null;
            }
            else {
                return $comment;
            }
        }
        else {
            return false;
        }
    }

    public function update(Comment $comment)
    {
        $this->pdoStatement = $this->pdo->prepare('UPDATE comments SET title = :title, content = :content WHERE comments.id = :id');
        $this->pdoStatement->bindValue(':title', $comment->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }

    public function delete(Comment $comment)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM comments WHERE comments.id = :id');
        $this->pdoStatement->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }
}