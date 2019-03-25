<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 13/03/19
 * Time: 11:41
 */

namespace BilletSimple\Engine\Manager;

use PDO;
use BilletSimple\Model\User;

class UserManager extends Manager
{
    public function create(User $user)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO users (id, login, password, role_id) VALUES (NULL, :login, :password, :role_id)');
        $this->pdoStatement->bindValue(':login', $user->getLogin(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':role_id', $user->getRoleId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }

    public function read($login)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM users WHERE login = :login');
        $this->pdoStatement->bindValue(':login', $login, PDO::PARAM_STR);
        $request = $this->pdoStatement->execute();

        if ($request) {
            $user = $this->pdoStatement->fetchObject('BilletSimple\Model\User');

            if ($user == false) {
                return null;
            }
            else {
                return $user;
            }
        }
        else {
            return false;
        }
    }

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM users');

        $users = [];

        while ($user = $this->pdoStatement->fetchObject('BilletSimple\Model\User'))
        {
            $users[] = $user;
        }

        return $users;
    }

    public function update(User $user)
    {

    }

    public function delete(User $user)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM users WHERE users.id = :id');
        $this->pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $this->pdoStatement->execute();
    }
}