<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 21/12/18
 * Time: 19:28
 */

namespace BilletSimple;

class User
{
    private $id;

    private $username;

    private $password;

    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    public function getUsername()
    {
        return $this->name;
    }

    public function setUsername($name)
    {
        $this->id = $name;
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this->role;
    }
}