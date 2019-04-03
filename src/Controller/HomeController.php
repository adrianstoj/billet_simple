<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 21/01/19
 * Time: 18:52
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Manager\ChapterManager;
use BilletSimple\Engine\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $manager = new ChapterManager();
        $chapters = $manager->readLast();

        $this->render('/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Default/homepage.php', [
            $chapters
        ]);
    }
}