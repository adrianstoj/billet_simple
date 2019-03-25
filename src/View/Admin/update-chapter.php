<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 12:03
 */
session_start();
$pageTitle = 'Editer chapitre';
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
<h2 class="header-title">Editer chapitre</h2>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
    <form action="/admin/editer-chapitre-<?php echo $data[0]->getId(); ?>" method="post">
        <input type="number" class="form-control" id="formSlug" placeholder="Numéro du chapitre" name="number" value="<?php echo ($data[0]->getNumber()) ?>" >
        <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title" value="<?php echo ($data[0]->getTitle()) ?>">
        <textarea name="content" class="adminarea""><?php echo ($data[0]->getContent()) ?></textarea>
        <button type="submit" class="btn btn-primary">Editer</button>
    </form>

<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>