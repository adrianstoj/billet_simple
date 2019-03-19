<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 08/03/19
 * Time: 12:35
 */
session_start();
$pageTitle = 'Ecrire chapitre';
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
<h2 class="header-title">Nouveau chapitre</h2>
<form action="publierChapitre" method="post">
    <input type="number" class="form-control" id="formNumber" placeholder="Numéro du chapitre" name="number">
    <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title">
    <textarea class="form-control adminarea" id="newComment" rows="3" name="content"></textarea>
    <button type="submit" class="btn btn-primary">Envoyer</button>
 </form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>