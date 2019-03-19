<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 18:39
 */
session_start();
$pageTitle = 'Editer commentaire';
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
    <div class="header-img"></div>
    <h2 class="header-title">Editer commentaires</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1">#</th>
        <th scope="col" class="comments-responsive">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col" class="comments-responsive">Date</th>
        <th scope="col" class="">Chapitre</th>
        <th scope="col" class="col-sm-1">Modifier</th>
        <th scope="col" class="col-sm-1">Signalements</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data[0] as $comment) {
        if ($comment->getReported() == 1) {
            echo('<tr>'.
                '<th scope="row" class="col-sm-1">'. $comment->getId().'</th>'.
                '<td class="comments-responsive">'. $comment->getTitle().'</td>'.
                '<td class="col-sm-1">'. $comment->getContent().'</td>'.
                '<td class="col-sm-1">'. $comment->getAuthor().'</td>'.
                '<td class="comments-responsive">'. $comment->getCommentDate().'</td>'.
                '<td class="col-sm-1">'. $comment->getChapterNumber().'</td>'.
                '<td class="col-sm-1"><a href="/admin/editer-commentaire-'. $comment->getId().'"><button class="btn btn-primary">Modifier</button></a><form action="/admin/supprimer-commentaire-'. $comment->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete">Supprimer</button></form></td>'.
                '<td class="col-sm-1">Aucun</td>'.
                '</tr>');
        }
        else {
            echo('<tr class="comment-reported">'.
                '<th scope="row" class="col-sm-1">'. $comment->getId().'</th>'.
                '<td class="comments-responsive">'. $comment->getTitle().'</td>'.
                '<td class="col-sm-1">'. $comment->getContent().'</td>'.
                '<td class="col-sm-1">'. $comment->getAuthor().'</td>'.
                '<td class="comments-responsive">'. $comment->getCommentDate().'</td>'.
                '<td class="col-sm-1">'. $comment->getChapterNumber().'</td>'.
                '<td class="col-sm-1"><a href="/admin/editer-commentaire-'. $comment->getId().'"><button class="btn btn-primary">Modifier</button></a><form action="/admin/supprimer-commentaire-'. $comment->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete">Supprimer</button></form></td>'.
                '<td class="col-sm-1"><a href="/admin/signalements-commentaire-'. $comment->getId().'"><button class="btn btn-primary">Voir</button></a></td>'.
                '</tr>');
        }
    }
    ?>
    </tbody>
</table>
<h3>Légende :</h3>
<div id="container-color-comment"></div>Commentaire signalé


<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>