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
}