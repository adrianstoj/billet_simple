<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 23/02/19
 * Time: 17:12
 */

namespace BilletSimple\Engine\Manager;

use BilletSimple\Model\Chapter;
use BilletSimple\Engine\Manager;
use PDO;

class ChapterManager extends Manager
{
    public function create(Chapter $chapter)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO chapters (id, number, title, content, slug, date) VALUES (NULL, :number, :title, :content, :slug, :date)');
        $this->pdoStatement->bindValue(':number', $chapter->getNumber(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':title', $chapter->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $chapter->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':slug', $chapter->getSlug(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':date', $chapter->getDate(), PDO::PARAM_STR);
        $this->pdoStatement->execute();
    }

    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM chapters WHERE id = :id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $request = $this->pdoStatement->execute();

        if ($request) {
            $chapter = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter');

            if ($chapter == false) {
                return null;
            }
            else {
                return $chapter;
            }
        }
        else {
            return false;
        }
    }

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM chapters');

        $chapters = [];

        while ($chapter = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter'))
        {
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function readLast()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM chapters ORDER BY date DESC LIMIT 3');

        $chapters = [];

        while ($chapter = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter'))
        {
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function update(Chapter $chapter)
    {
        $this->pdoStatement = $this->pdo->prepare('UPDATE chapters SET number = :number, title = :title, content = :content WHERE chapters.id = :id');
        $this->pdoStatement->bindValue(':number', $chapter->getNumber(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':title', $chapter->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $chapter->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $chapter->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }

    public function delete(Chapter $chapter)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM chapters WHERE chapters.id = :id');
        $this->pdoStatement->bindValue(':id', $chapter->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }
}