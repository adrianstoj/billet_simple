<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:56
 */

namespace BilletSimple\Controller;

use BilletSimple\Engine\Controller;
use BilletSimple\Engine\Manager\ChapterManager;
use BilletSimple\Engine\Manager\CommentManager;
use BilletSimple\Engine\Manager\ReportingManager;
use BilletSimple\Model\Chapter;
use DateTime;

class AdminController extends Controller
{
    public function index()
    {
        $reportingManager = new ReportingManager();
        $reportings = $reportingManager->readAll();

        $commentManager = new CommentManager();
        $lastComments = $commentManager->readLast();

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/admin.php', [
            $reportings,
            $lastComments
        ]);
    }

    public function writeChapter()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/new-chapter.php', [

        ]);
    }

    public function postChapter()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $slug = 'chapitre-'. $_POST['slug'];
        $date = new DateTime();
        $date = date('Y-m-d H:i:s');

        $chapter = new Chapter();
        $chapter->setTitle($title);
        $chapter->setContent($content);
        $chapter->setSlug($slug);
        $chapter->setDate($date);

        $chapterManager = new ChapterManager();
        $chapterManager->create($chapter);

        header('Location: /admin/nouveau-chapitre');
    }

    public function editChapters()
    {
        $manager = new ChapterManager();
        $chapters = $manager->readAll();

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/edit-chapters.php', [
            $chapters
        ]);
    }

    public function updateChapter()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[2];
        $chapterManager = new ChapterManager();
        $chapter = $chapterManager->read($chapterId);

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/update-chapter.php', [
            $chapter
        ]);
    }

    public function postEditChapter()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[2];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $chapter = new Chapter();
        $chapter->setTitle($title);
        $chapter->setContent($content);
        $chapter->setId($chapterId);

        $chapterManager = new ChapterManager();
        $chapterManager->update($chapter);

        header('Location: /admin/editer-chapitre-'. $chapterId);
    }

    public function deleteChapter()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[2];

        $chapter = new Chapter();
        $chapter->setId($chapterId);

        $chapterManager = new ChapterManager();
        $chapterManager->delete($chapter);

        header('Location: /admin/edition-chapitre');
    }

    public function editComments()
    {
//        $chapterManager = new ChapterManager();
//        $chapters = $chapterManager->readAll();
//        $chaptersId = [];
//        foreach ($chapters as $chapter) {
//            $chapterId = $chapter->getId();
//            array_push($chaptersId, $chapterId);
//        }
//        dump($chaptersId);
//
        $commentManager = new CommentManager();
//        $allComments = [];
//        foreach ($chaptersId as $chapterId) {
//            $comments = $commentManager->readAllBy($chapterId);
//            array_push($allComments, $comments);
//        }
//        dump($allComments);

        $comments = $commentManager->readAll();

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/edit-comments.php', [
            $comments
        ]);
    }
}