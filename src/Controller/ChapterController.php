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
use BilletSimple\Engine\Manager\ReportingManager;
use BilletSimple\Model\Comment;
use BilletSimple\Model\Reporting;
use DateTime;

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

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/chapter.php', [
            $chapterId,
            $chapterContent,
            $comments
        ]);
    }

    public function addComment()
    {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[1];

        $date = new DateTime();
        $date = date('Y-m-d H:i:s');

        $commentManager = new CommentManager();
        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setTitle($title);
        $comment->setContent($content);
        $comment->setCommentDate($date);
        $comment->setChapterId($chapterId);
        $commentManager->create($comment);

        header('Location: /chapitre-' . $chapterId);
    }

    public function reportComment()
    {
        $postValues = $_POST['report'];
        $commentChapterIDs = explode(' ', $postValues);
        $commentId = $commentChapterIDs[0];
        $chapterId = $commentChapterIDs[1];

        $reportingManager = new ReportingManager();
        $reporting = new Reporting();
        $reporting->setCommentId($commentId);
        $reportingManager->create($reporting);

        header('Location: /chapitre-' . $chapterId);
    }
}