<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 14/03/19
 * Time: 16:26
 */

namespace BilletSimple\Engine\Manager;

use PDO;

include ('../app/parameters.php');
abstract class Manager
{
    protected $pdo;

    protected $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host='. DB_HOST. ';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
    }
}