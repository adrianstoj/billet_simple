<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 21/01/19
 * Time: 18:52
 */

namespace BilletSimple\Controller;


use BilletSimple\Model\Chapter;
use BilletSimple\Engine\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/homepage.php', []);
    }
}