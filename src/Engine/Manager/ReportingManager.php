<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 19:18
 */

namespace BilletSimple\Engine\Manager;

use PDO;
use BilletSimple\Model\Reporting;

class ReportingManager
{
    private $pdo;

    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=billet_simple', 'root', 'testsql');
    }

    public function create(Reporting $reporting)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO reportings (id, comment_id) VALUES (NULL, :comment_id)');
        $this->pdoStatement->bindValue(':comment_id', $reporting->getCommentId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }

    public function readAllBy($commentId)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM reportings WHERE comment_id = :comment_id');
        $this->pdoStatement->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
        $this->pdoStatement->execute();

        $reportings = [];

        while ($reporting = $this->pdoStatement->fetchObject('BilletSimple\Model\Reporting'))
        {
            $reportings[] = $reporting;
        }

        return $reportings;
    }

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM reportings');

        $reportings = [];

        while ($reporting = $this->pdoStatement->fetchObject('BilletSimple\Model\Reporting'))
        {
            $reportings[] = $reporting;
        }

        return $reportings;
    }

    public function readLast()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM reportings ORDER BY id DESC LIMIT 5');

        $reportings = [];

        while ($reporting = $this->pdoStatement->fetchObject('BilletSimple\Model\Reporting'))
        {
            $reportings[] = $reporting;
        }

        return $reportings;
    }

    public function delete(Reporting $reporting)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM reportings WHERE reportings.id = :id');
        $this->pdoStatement->bindValue(':id', $reporting->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }
}