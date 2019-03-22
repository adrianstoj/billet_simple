<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/01/19
 * Time: 16:19
 */

namespace BilletSimple\Engine;

use BilletSimple\Engine\Session\PHPSession;

abstract class Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new PHPSession();
    }

    public function render($fileName, $data = [])
    {
        require $fileName;
        return $data;
    }
}