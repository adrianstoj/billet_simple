<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 02/03/19
 * Time: 16:45
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/contact.php', [

        ]);
    }
}