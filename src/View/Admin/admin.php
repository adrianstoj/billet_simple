<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:58
 */
session_start();
if (!isset($_SESSION['login']) AND !isset($_SESSION['role']))
{
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
elseif (isset($_SESSION['login']) AND isset($_SESSION['role']) AND !isset($_SESSION['role'])) {
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php';
?>

<div class="header-img"></div>
<h2 class="header-title">Administration</h2>

<a href="/admin/nouveau-chapitre"><button class="btn btn-primary">Ecrire un chapitre</button></a>
<a href="/admin/edition-chapitre"><button class="btn btn-primary">Modifier un chapitre</button></a>
<a href="/admin/editer-commentaires"><button class="btn btn-primary">Administrer les commentaires</button></a>
    <a href="/admin/editer-utilisateur"><button class="btn btn-primary">Editer un utilisateur</button></a>

<p>Signalements:</p>
<ul id="reportingsList">
<?php
foreach ($data[0] as $reporting) {
    echo ('<li><b>Signalement '. $reporting->getId(). '</b>'. ' du commentaire numéro '. $reporting->getCommentId(). '</li>');
}
?>
</ul>

<p>Derniers commentaires:</p>
<ul id="lastComments">
    <?php
    foreach ($data[1] as $comment) {
        $commentDate = $comment->getCommentDate();
        $date = explode(' ', $commentDate);
        echo ('<li><b>'. $comment->getAuthor(). '</b> le '. $date[0]. ' à '. $date[1]. '</br>'. $comment->getContent(). '</li>');
    }
    ?>
</ul>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>