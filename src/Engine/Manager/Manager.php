<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 14/03/19
 * Time: 16:26
 */

namespace BilletSimple\Engine;


abstract class Manager
{
    private $pdo;

    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=billet_simple', 'root', 'testsql');
    }
}