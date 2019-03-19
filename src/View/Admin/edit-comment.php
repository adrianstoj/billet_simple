<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 18/03/19
 * Time: 17:06
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
    <h2 class="header-title">Editer commentaire</h2>
    <form action="/admin/editer-commentaire-<?php echo $data[0]->getId(); ?>" method="post">
        <input type="text" class="form-control" id="formChapter" placeholder="Titre du commentaire" name="title" value="<?php echo ($data[0]->getTitle()) ?>">
        <textarea name="content" class="adminarea""><?php echo ($data[0]->getContent()) ?></textarea>
        <button type="submit" class="btn btn-primary">Editer</button>
    </form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>