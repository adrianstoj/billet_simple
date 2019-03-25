<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 27/01/19
 * Time: 21:07
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Controller;
use BilletSimple\Engine\Manager\ChapterManager;

class TableController extends Controller
{
    public function index()
    {
        $manager = new ChapterManager();
        $chapters = $manager->readAll();
        $this->render('/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Default/table.php', [
            $chapters
        ]);
    }
}