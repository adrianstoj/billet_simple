<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 13/03/19
 * Time: 12:05
 */

namespace BilletSimple\Model;


class Role
{
    private $id;

    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}