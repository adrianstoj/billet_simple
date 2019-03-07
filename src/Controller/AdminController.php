<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:56
 */

namespace BilletSimple\Controller;

use BilletSimple\Engine\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/admin.php', [

        ]);
    }
}