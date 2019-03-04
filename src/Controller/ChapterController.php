<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 24/02/19
 * Time: 10:32
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Controller;
use BilletSimple\Engine\Manager\ChapterManager;
use BilletSimple\Engine\Manager\CommentManager;

class ChapterController extends Controller
{
    public function index()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[1];
        $chapterManager = new ChapterManager();
        $chapter = $chapterManager->read($chapterId);
        $chapterContent = $chapter->getContent();

        $commentManager = new CommentManager();
        $comments = $commentManager->readAllBy($chapterId);

        dump($comments);

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/chapter.php', [
            $chapterId,
            $chapterContent
        ]);
    }
}