<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 18:39
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
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div id="home_image"></div>
<h2>EDITER COMMENTAIRES</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Date</th>
        <th scope="col">Chapitre</th>
        <th scope="col">Signalements</th>
        <th scope="col">Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data[0] as $comment) {
    echo('<tr>'.
        '<th scope="row">'. $comment->getId().'</th>'.
        '<td>'. $comment->getTitle().'</td>'.
        '<td>'. $comment->getContent().'</td>'.
        '<td>'. $comment->getAuthor().'</td>'.
        '<td>'. $comment->getCommentDate().'</td>'.
        '<td>'. $comment->getChapterNumber().'</td>'.
        '<td><a href="/admin/signalements-commentaire-'. $comment->getId().'"><button class="btn btn-primary">Voir</button></a></td>'.
        '<td><button class="btn btn-primary">Modifier</button><form action="/admin/supprimer-commentaire-'. $comment->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete">Supprimer</button></form></td>'.
    '</tr>');
    }
    ?>
    </tbody>
</table>


<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>