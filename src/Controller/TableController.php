<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 27/01/19
 * Time: 21:07
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Manager\ChapterManager;
use BilletSimple\Model\Chapter;
use BilletSimple\Engine\Controller;

class TableController extends Controller
{
    public function index()
    {
        $chapter = new Chapter();
        $manager = new ChapterManager();
        $chapters = $manager->readAll();
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/table.php', [
            $chapters,
            'test'
        ]);
    }
}