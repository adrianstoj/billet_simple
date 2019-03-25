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
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php'; ?>
<div class="header-img"></div>
<h2 class="header-title">Nouveau chapitre</h2>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
<form action="publierChapitre" method="post">
    <input type="number" class="form-control" id="formNumber" placeholder="Numéro du chapitre" name="number">
    <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title">
    <textarea class="form-control adminarea" id="newComment" rows="3" name="content"></textarea>
    <button type="submit" class="btn btn-primary">Envoyer</button>
 </form>

<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>