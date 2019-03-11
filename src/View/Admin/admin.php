<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:58
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php';
?>

<div id="home_image"></div>
<h2>ADMIN</h2>

<a href="/admin/nouveau-chapitre"><button class="btn btn-primary">Ecrire un chapitre</button></a>
<a href="/admin/edition-chapitre"><button class="btn btn-primary">Modifier un chapitre</button></a>
<a href="/admin/editer-commentaires"><button class="btn btn-primary">Administrer les commentaires</button></a>
<button class="btn btn-primary">Créer un utilisateur</button>

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