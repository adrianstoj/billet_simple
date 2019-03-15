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
use BilletSimple\Engine\Manager\UserManager;
use BilletSimple\Model\Chapter;
use BilletSimple\Model\Comment;
use BilletSimple\Model\Reporting;
use BilletSimple\Model\User;
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
        $number = $_POST['number'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $slug = 'chapitre-'. $_POST['number'];
        $date = new DateTime();
        $date = date('Y-m-d H:i:s');

        $chapter = new Chapter();
        $chapter->setTitle($title);
        $chapter->setNumber($number);
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
        $chapterNb = $_POST['number'];
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $chapterId = $id[2];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $chapter = new Chapter();
        $chapter->setNumber($chapterNb);
        $chapter->setTitle($title);
        $chapter->setContent($content);
        $chapter->setId($chapterId);

        $chapterManager = new ChapterManager();
        $chapterManager->update($chapter);

        header('Location: /admin/edition-chapitre');
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
        $commentManager = new CommentManager();
        $comments = $commentManager->readAll();

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/edit-comments.php', [
            $comments
        ]);
    }

    public function deleteComment()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $commentId = $id[2];

        $comment = new Comment();
        $comment->setId($commentId);

        $commentManager = new CommentManager();
        $commentManager->delete($comment);

        header('Location: /admin/editer-commentaires');
    }

    public function listReportings()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $commentId = $id[2];

        $reportingManager = new ReportingManager();
        $reportings = $reportingManager->readAllBy($commentId);

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/list-reportings.php', [
            $reportings,
            $commentId
        ]);
    }

    public function deleteReporting()
    {
        $uri = ($_SERVER['REQUEST_URI']);
        $id = explode('-', $uri);
        $reportingId = $id[2];

        $commentId = $_POST['comment'];

        $reporting = new Reporting();
        $reporting->setId($reportingId);

        $commentManager = new ReportingManager();
        $commentManager->delete($reporting);

        header('Location: /admin/signalements-commentaire-'. $commentId);
    }

    public function editUser()
    {
        $userManager = new UserManager();
        $users = $userManager->readAll();

        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Admin/edit-user.php', [
            $users
        ]);
    }

    public function createUser()
    {
        if (isset($_POST['login']) && $_POST['password'] && $_POST['role'])
        {
            $login = $_POST['login'];
            $role = $_POST['role'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($role == 'admin') {
                $roleId = 1;
            }
            elseif ($role == 'author') {
                $roleId = 2;
            }
            elseif ($role == 'moderator') {
                $roleId = 3;
            }

            $user = new User();
            $user->setLogin($login);
            $user->setPassword($password);
            $user->setRoleId($roleId);

            $userManager = new UserManager();
            $userManager->create($user);

            header('Location: /admin/editer-utilisateur');
        }
        else {
            header('Location: /404');
        }
    }

    public function updateUser()
    {

    }

    public function deleteUser()
    {
        $userId = $_POST['delete'];

        $user = new User();
        $user->setId($userId);

        $userManager = new UserManager();
        $userManager->delete($user);

        header('Location: /admin/editer-utilisateur');
    }
}