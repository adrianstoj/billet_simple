<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 24/02/19
 * Time: 10:52
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        $this->render('/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Default/404.php', []);
    }
}