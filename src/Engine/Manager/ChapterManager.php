<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 23/02/19
 * Time: 17:12
 */

namespace BilletSimple\Engine\Manager;


use PDO;
use BilletSimple\Model\Chapter;

class ChapterManager
{
    private $pdo;

    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=billet_simple', 'root', 'testsql');
    }

    public function create(Chapter $chapter)
    {

    }

    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM Chapter WHERE id = :id');
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
        $this->pdoStatement = $this->pdo->query('SELECT * FROM Chapter');

        $chapters = [];

        while ($chapter = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter'))
        {
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function readLast()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM Chapter ORDER BY date LIMIT 3');

        $chapters = [];

        while ($chapter = $this->pdoStatement->fetchObject('BilletSimple\Model\Chapter'))
        {
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function update(Chapter $chapter)
    {

    }

    public function delete(Chapter $chapter)
    {

    }
}