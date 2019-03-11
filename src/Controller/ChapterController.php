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
        $chapterNb = $id[1];
        $chapterId = $id[2];
        $chapterManager = new ChapterManager();
        $chapter = $chapterManager->read($chapterId);
        $chapterContent = $chapter->getContent();

        $commentManager = new CommentManager();
        $comments = $commentManager->readAllBy($chapterId);

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/chapter.php', [
            $chapterNb,
            $chapterContent,
            $comments,
            $chapterId
        ]);
    }

    public function addComment()
    {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterNb = $id[1];
        $chapterId = $id[2];

        $date = new DateTime();
        $date = date('Y-m-d H:i:s');

        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setTitle($title);
        $comment->setContent($content);
        $comment->setCommentDate($date);
        $comment->setChapterId($chapterId);

        $commentManager = new CommentManager();
        $commentManager->create($comment);

        header('Location: /chapitre-' . $chapterNb. '-'. $chapterId);
    }

    public function reportComment()
    {
        $postValues = $_POST['report'];
        $commentChapterIDs = explode(' ', $postValues);
        $commentId = $commentChapterIDs[0];
        $chapterNb = $commentChapterIDs[1];
        $chapterId = $commentChapterIDs[2];

        $reportingManager = new ReportingManager();
        $reporting = new Reporting();
        $reporting->setCommentId($commentId);
        $reportingManager->create($reporting);

        header('Location: /chapitre-' . $chapterNb. '-'. $chapterId);
    }
}