<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/01/19
 * Time: 16:19
 */

namespace BilletSimple\Engine;

abstract class Controller
{
    public function render($fileName, $data = [])
    {
        require $fileName;
        return $data;
    }
}