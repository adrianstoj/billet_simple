<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:58
 */
session_start();
$pageTitle = 'Tableau de bord';
if (!isset($_SESSION['login']) AND !isset($_SESSION['role']))
{
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
elseif (isset($_SESSION['login']) AND isset($_SESSION['role']) AND !isset($_SESSION['role'])) {
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php';
?>

<div class="header-img"></div>
<h2 class="header-title">Administration</h2>

<h3>Tableau de bord</h3>
<h3>Bienvenue dans votre espace d'administration, ici vous pouvez :</h3>

<a href="/admin/nouveau-chapitre" class="admin-board"><i class="glyphicon glyphicon-pencil"></i> Ecrire un chapitre</a>
</br>
<a href="/admin/edition-chapitre" class="admin-board"><i class="glyphicon glyphicon-edit"></i> Modifier un chapitre</button></a>
</br>
<a href="/admin/editer-commentaires" class="admin-board"><i class="glyphicon glyphicon-comment"></i> Administrer les commentaires</a>
</br>
<a href="/admin/editer-utilisateur" class="admin-board"><i class="glyphicon glyphicon-user"></i> Editer un utilisateur</a>

<h3>Derniers signalements:</h3>
<ul id="reportingsList">
<?php
foreach ($data[0] as $reporting) {
    echo ('<li><b>Signalement '. $reporting->getId(). '</b>'. ' du commentaire numéro '. $reporting->getCommentId(). '</li>');
}
?>
</ul>

<h3>Derniers commentaires:</h3>
<ul id="lastComments">
    <?php
    foreach ($data[1] as $comment) {
        $commentDate = $comment->getCommentDate();
        $date = explode(' ', $commentDate);
        echo ('<li><b>'. $comment->getAuthor(). '</b> le '. $date[0]. ' à '. $date[1]. '</br>'. $comment->getContent(). '</li>');
    }
    ?>
</ul>

<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>