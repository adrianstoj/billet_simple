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
use BilletSimple\Engine\Session\PHPSession;
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
        if ($chapter != null) {
            $chapterTitle = $chapter->getTitle();
            $chapterContent = $chapter->getContent();

            $commentManager = new CommentManager();
            $comments = $commentManager->readAllBy($chapterId);

            $this->render('/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Default/chapter.php', [
                $chapterNb,
                $chapterContent,
                $comments,
                $chapterId,
                $chapterTitle
            ]);
        }
        else {
            header('Location: /404');
        }
    }

    public function addComment()
    {
        if (isset($_POST['author']) && $_POST['content']) {
            $author = htmlspecialchars($_POST['author']);
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);

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
            $comment->setChapterNumber($chapterNb);

            $commentManager = new CommentManager();
            $commentManager->create($comment);


            $PHPSession = new PHPSession();
            $PHPSession->set('success', 'Votre commentaire a bien été ajouté.');
            header('Location: /chapitre-' . $chapterNb. '-'. $chapterId);
        }
        else {
            header('Location: /404');
            $PHPSession = new PHPSession();
            $PHPSession->set('failure', 'Votre commentaire n\'a pas été ajouté');
        }
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

        $PHPSession = new PHPSession();
        $PHPSession->set('success', 'Le commentaire a bien été signalé');
        header('Location: /chapitre-' . $chapterNb. '-'. $chapterId);
    }
}